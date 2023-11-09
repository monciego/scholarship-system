# Scholarship System for Pangasinan State University

Welcome to the Scholarship System for Pangasinan State University! This system allows you to manage scholarships and provides students with personalized scholarship suggestions. It also features mobile push notifications to keep users informed about important updates.

## Getting Started

Follow these steps to clone and set up the project on your local machine:

1. **Clone the repository:**

    ```bash
    git clone https://github.com/monciego/scholarship-system.git
    ```

2. **Install PHP dependencies:**

    ```bash
    composer install
    ```

3. **Install JavaScript dependencies:**

    ```bash
    npm install
    ```

4. **Copy the environment file:**

    ```bash
    cp .env.example .env
    ```

5. **Generate an application key:**

    ```bash
    php artisan key:generate
    ```

6. **Run database migrations:**

    ```bash
    php artisan migrate
    ```

7. **Start the development server:**

    ```bash
    php artisan serve
    ```

8. **In another terminal, compile assets for development:**

    ```bash
    npm run dev
    ```

## Accessing the System

Visit [http://127.0.0.1:8000/](http://127.0.0.1:8000/) in your browser to access the Scholarship System.

Thank you for exploring the Scholarship System for Pangasinan State University! 🎓🌟
