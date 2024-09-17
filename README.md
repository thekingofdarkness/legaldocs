# LegalDocs

![LegalDocs Banner](https://link-to-your-screenshot-or-logo.com)

## Introduction

LegalDocs is a platform that allows users to share and manage legal documents in an easy and organized manner. This project was built to assist lawyers, legal professionals, and anyone dealing with legal documents in uploading, sharing, and managing files efficiently. The platform provides various features including user authentication, file sharing, and an admin dashboard to manage uploads and monitor activities.

Our team consists of [Abderrahman Bouichou](https://www.linkedin.com/in/abderrahmanbouichou). The timeline of this project was two months, during which we focused on delivering a functional MVP (Minimum Viable Product) that is both web and mobile-friendly.

The primary audience for this project includes legal professionals, law students, and individuals working in the legal industry. My personal focus during the project was on developing the backend, handling authentication, and building the admin dashboard.

- [Deployed App](http://alphabetrium.tech/)
- [Landing Page](https://thekingofdarkness.github.io/)

## Installation

To run the project locally, follow these steps:

1. Clone the repository:

    ```bash
    git clone https://github.com/thekingofdarkness/legaldocs.git
    cd legaldocs
    ```

2. Install dependencies:

    ```bash
    composer install
    npm install
    ```

3. Configure your environment by copying the `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Set up your database configuration in the `.env` file.

5. Run database migrations and seeders:

    ```bash
    php artisan migrate --seed
    ```

6. Start the development server:

    ```bash
    php artisan serve
    ```

7. Visit the app at `http://localhost:8000`.

## Usage

Once you have the app running locally, you can:

- Register a new user or log in using an existing account.
- Upload legal documents.
- Share documents via unique links.
- View and manage uploaded documents from the admin dashboard.

## Contributing

Contributions are welcome! To contribute:

1. Fork the repository.
2. Create a new branch for your feature:

    ```bash
    git checkout -b feature-name
    ```

3. Commit your changes and push the branch:

    ```bash
    git add .
    git commit -m "Add feature-name"
    git push origin feature-name
    ```

4. Open a pull request.

## Related Projects

- [Task Manager](https://github.com/thekingofdarkness/taskmanager)
- [Portfolio Website](https://thekingofdarkness.github.io/)

## Licensing

This project is open source and available under the [MIT License](LICENSE).

