# Automated cPanel Deployment (Tailored to Your Setup)

Your project already has the standard cPanel directory structure:
- **Backend Code:** `/home/avilashs/portfolio/`
- **Web Root & Assets:** `/home/avilashs/public_html/`

**You do NOT need to move, delete, or re-link `public_html`.** Everything is already in place.

---

## How the Deployment Workflow Works

When you push or merge into `master`, GitHub Actions (`.github/workflows/deploy.yml`):
1. Runs `composer install --no-dev` & compiles frontend assets with `npm run build`.
2. Syncs the Laravel application code into `/home/avilashs/portfolio/` (protecting your `.env` and `storage`).
3. Syncs the compiled assets (`build/`, `assets/`, etc.) into `/home/avilashs/public_html/` without touching your custom `index.php`, `.htaccess`, `.well-known`, or `storage` symlink.
4. Runs `php artisan migrate --force` and caches config, routes, and views.

---

## Setup Steps (Only 2 quick steps needed)

### Step 1: Generate and Authorize SSH Key in cPanel

1. Log in to your **cPanel** dashboard.
2. In the search bar, search for **SSH Access** (under the *Security* section).
3. Click **Manage SSH Keys** > **Generate a New Key**:
   - **Key Name**: `github_deploy_key`
   - **Key Password**: *Leave completely blank*
   - **Key Type**: `RSA`
   - **Key Size**: `4096`
4. Click **Generate Key**.
5. Back on the Manage SSH Keys screen:
   - Under **Public Keys**, find `github_deploy_key` &rarr; click **Manage** &rarr; click **Authorize**.
   - Under **Private Keys**, find `github_deploy_key` &rarr; click **View/Download** &rarr; copy the entire private key text (from `-----BEGIN OPENSSH PRIVATE KEY-----` to `-----END OPENSSH PRIVATE KEY-----`).

---

### Step 2: Add Secrets to GitHub Repository

On GitHub, go to your repository:
**Settings** &rarr; **Secrets and variables** &rarr; **Actions** &rarr; Click **New repository secret**.

Add these 4 secrets:

| Secret Name | Value |
| :--- | :--- |
| `CPANEL_SSH_HOST` | Your server domain or IP (e.g. `yourdomain.com` or server IP address) |
| `CPANEL_SSH_USER` | `avilashs` (your cPanel username) |
| `CPANEL_SSH_KEY` | The private key copied from Step 1 |
| `CPANEL_SSH_PORT` | `22` (or your hosting provider's custom SSH port, e.g. `2222`) |

---

## Step 3: Deploy

Whenever you're ready, push your changes to `master`:

```bash
git add .
git commit -m "Setup automated cPanel deployment"
git push origin master
```

Go to the **Actions** tab on your GitHub repo to watch the deployment run.
