# To-Do API (Laravel 12 + Sail + MySQL)

Мини-CRUD без аутентификации и без версии в URL.

## Быстрый запуск
```bash
git clone <repo-url> to-do && cd to-do
cp .env.example .env   # при необходимости поправьте DB_*
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed   # или migrate
```

**Эндпоинты**
```
GET /api/tasks — список (пагинация 20)

POST /api/tasks — создать

GET /api/tasks/{id} — показать

PUT /api/tasks/{id} — обновить

DELETE /api/tasks/{id} — удалить
```
**Модель Task:** id, title, description, status, created_at, updated_at <br>
**status:** todo | in_progress | done

**Структура (основное)**
```
app/
 ├─ Http/Controllers/Api/TaskController.php
 ├─ Http/Requests/TaskStoreRequest.php
 ├─ Http/Requests/TaskUpdateRequest.php
 ├─ Http/Resources/TaskResource.php
 └─ Models/Task.php
database/
 ├─ migrations/*create_tasks_table.php
 ├─ seeders/TaskSeeder.php
 └─ factories/TaskFactory.php
routes/
 └─ api.php  # Route::apiResource('tasks', TaskController::class)
```
**Заметки**
В TaskStoreRequest и TaskUpdateRequest включена авторизация:
```
public function authorize(): bool { return true; }
```
**Для удобной отладки:**
```
./vendor/bin/sail artisan route:list --path="api/tasks"
./vendor/bin/sail artisan migrate:fresh --seed
```

**Готово!**
