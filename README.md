# Task Management App

A small Laravel task management application to manage Projects and Tasks with CRUD operations, relationships, and status tracking.

## Installation

Prerequisites:
- PHP (8.x recommended)
- Composer
- Node.js + npm
- SQLite/MySQL/Postgres (configure in `.env`)

1. Clone repository

```bash
git clone https://github.com/athulrajpb007/task-management-app.git
cd task-management-app
```

2. Install dependencies

```bash
composer install
npm install
npm run dev
```

3. Setup environment

Copy the example env:

```bash
cp .env.example .env
```

Set database credentials in `.env` accordingly:

```
DB_CONNECTION=mysql
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=
```

Generate the application key:

```bash
php artisan key:generate
```

4. Run migrations & seed sample data

```bash
php artisan migrate:fresh --seed
```

4.1. File upload setup

Create the storage symlink so uploaded files (attachments) are publicly accessible:

```bash
php artisan storage:link
```

5. Start the development server

```bash
php artisan serve
```

Open the app in your browser:

http://127.0.0.1:8000


## Authentication

- Register: `/register`
- Login: `/login`
- Dashboard (protected): `/dashboard`


## Excel Export

- Navigate to the Tasks page in the app.
- Click **Export** to download `tasks.xlsx` with task data.


## API Endpoints

Base URL: `/api`

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET    | /projects | Get all projects |
| GET    | /tasks | Get all tasks |
| GET    | /projects/{id}/tasks | Get tasks for a project |
| PATCH  | /tasks/{id}/status | Update a task's status |

Notes:
- API endpoints follow typical Laravel API routing conventions.

## Database Structure

Projects
- id
- name
- description
- start_date
- end_date

Tasks
- id
- project_id
- title
- description
- assigned_to
- status
- attachment
- due_date
- deleted_at


## Seeders & Factories

The project uses Laravel Factories with Faker to generate sample projects and tasks. Running the seeders (`php artisan migrate:fresh --seed`) will populate example data for local development.

---