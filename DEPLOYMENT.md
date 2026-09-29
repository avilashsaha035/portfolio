# 🚀 Laravel প্রজেক্টে GitHub Actions দিয়ে cPanel অটোমেটেড ডিপ্লয়মেন্ট গাইড (CI/CD)

এই প্রজেক্টটিতে GitHub Actions-এর মাধ্যমে সম্পূর্ণ স্বয়ংক্রিয় ডিপ্লয়মেন্ট (CI/CD Pipeline) সেটআপ করা হয়েছে। এখন থেকে যখনই আপনি `master` ব্রাঞ্চে কোড **`push`** করবেন অথবা অন্য কোনো ব্রাঞ্চ থেকে `master`-এ **`merge`** করবেন, সাথে সাথে স্বয়ংক্রিয়ভাবে আপনার cPanel লাইভ সার্ভারে প্রজেক্টটি ডিপ্লয় ও আপডেট হয়ে যাবে।

---

## 📌 কীভাবে পুরো সিস্টেমটি কাজ করে (Architecture)

GitHub Actions রানার ক্লাউডে নিচের কাজগুলো ক্রমান্বয়ে সম্পাদন করে:
1. **ডিপেন্ডেন্সি ও অ্যাসেট বিল্ড:**
   - PHP 8.2 ও Node.js 20 রানার এনভায়রনমেন্ট সেটআপ করে।
   - প্রোডাকশন কম্পোজার প্যাকেজ ইনস্টল করে (`composer install --no-dev --optimize-autoloader`)।
   - ফ্রন্টএন্ড Vite অ্যাসেট বিল্ড করে (`npm run build`)।
2. **স্মার্ট ফাইল ট্রান্সফার (`tar` over SSH):**
   - ক্লাউডে বিল্ট হওয়া ব্যাকএন্ড কোড `/home/avilashs/portfolio/` ফোল্ডারে পাঠিয়ে আনপ্যাক করে (সার্ভারের `.env` এবং `storage` সম্পূর্ণ সুরক্ষিত রেখে)।
   - ফ্রন্টএন্ডের বিল্ড ফাইল (`build/`) এবং অ্যাসেট সরাসরি `/home/avilashs/public_html/` ফোল্ডারে পাঠিয়ে দেয়—যার ফলে আপনার কাস্টম `index.php`, `.htaccess`, `.well-known`, এবং `storage` সিমলিংক বিন্দুমাত্র ক্ষতিগ্রস্ত হয় না।
3. **পোস্ট-ডিপ্লয় কমান্ড:**
   - সার্ভারের ভেতর ডাটাবেজ মাইগ্রেশন চালায় (`php artisan migrate --force`)।
   - রুট, কনফিগ এবং ভিউ ক্যাশ ক্লিয়ার ও রি-অপটিমাইজ করে।

---

## 📁 সার্ভারের ফোল্ডার স্ট্রাকচার

নিরাপত্তা ও স্ট্যান্ডার্ড নিয়ম অনুযায়ী প্রজেক্টটি দুই ভাগে বিভক্ত:
- **ব্যাকএন্ড কোড:** `/home/avilashs/portfolio/` *(public_html-এর বাইরে)*
- **লাইভ ওয়েব রুট:** `/home/avilashs/public_html/` *(যেখানে কম্পাইল হওয়া অ্যাসেট ও এন্ট্রি পয়েন্ট থাকে)*

> ⚠️ **মনে রাখবেন:** আপনার `public_html` ফোল্ডার ডিলিট, মুভ বা রিনেম করার কোনো প্রয়োজন নেই। সব কিছু আগের মতোই ঠিক থাকবে।

---

## 🛠️ স্টেপ-বাই-স্টেপ সেটআপ গাইড (যেকোনো প্রজেক্টের জন্য)

### ধাপ ১: cPanel-এ পাসফ্রেজ ছাড়া SSH Key তৈরি করা
GitHub Actions নন-ইন্টারঅ্যাক্টিভভাবে চলে, তাই SSH কী-তে কোনো পাসওয়ার্ড/পাসফ্রেজ থাকা যাবে না। cPanel **Terminal**-এ গিয়ে নিচের কমান্ডগুলো রান করুন:

```bash
# ১. পাসফ্রেজ ছাড়া নতুন RSA 4096-bit কী তৈরি করুন
ssh-keygen -t rsa -b 4096 -N "" -f ~/.ssh/github_deploy_key

# ২. কী-টি সার্ভারের authorized_keys-এ যুক্ত করুন
cat ~/.ssh/github_deploy_key.pub >> ~/.ssh/authorized_keys
chmod 600 ~/.ssh/authorized_keys

# ৩. প্রাইভেট কী-টি স্ক্রিনে প্রিন্ট করুন
cat ~/.ssh/github_deploy_key
```

স্ক্রিনে `-----BEGIN OPENSSH PRIVATE KEY-----` থেকে `-----END OPENSSH PRIVATE KEY-----` পর্যন্ত যে লেখাটি আসবে, তা সম্পূর্ণ কপি করে নিন।

---

### ধাপ ২: GitHub Repository Secrets কনফিগার করা
GitHub-এ আপনার রিপোজিটরিতে যান:  
👉 **Settings** &rarr; **Secrets and variables** &rarr; **Actions** &rarr; **New repository secret**-এ ক্লিক করে নিচের ৪টি সিক্রেট যোগ করুন:

| Secret Name | Value (উদাহরণ) | বিবরণ |
| :--- | :--- | :--- |
| `CPANEL_SSH_HOST` | `51.79.xxx.xx` অথবা `yourdomain.com` | আপনার সার্ভারের আসল আইপি বা ডোমেইন (কোনো অতিরিক্ত স্পেস বা লেখা ছাড়া) |
| `CPANEL_SSH_USER` | `avilashs` | আপনার cPanel ইউজারনেম |
| `CPANEL_SSH_KEY` | `-----BEGIN OPENSSH PRIVATE KEY...` | ধাপ ১-এ কপি করা সম্পূর্ণ প্রাইভেট কী |
| `CPANEL_SSH_PORT` | `22` অথবা কাস্টম পোর্ট (যেমন: `2222`) | হোস্টিং প্রোভাইডারের দেওয়া সক্রিয় SSH পোর্ট |

---

### ধাপ ৩: GitHub Actions Workflow ফাইল (`.github/workflows/deploy.yml`)
প্রজেক্টের রুটে `.github/workflows/deploy.yml` ফাইলে নিচের কোডটি রাখতে হবে:

```yaml
name: Deploy to cPanel

on:
  push:
    branches:
      - master

concurrency:
  group: production-deploy
  cancel-in-progress: true

jobs:
  build-and-deploy:
    runs-on: ubuntu-latest

    steps:
      - name: Checkout Code
        uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: mbstring, xml, ctype, iconv, intl, pdo_mysql, dom, filter, json, libxml, bcmath, fileinfo
          tools: composer:v2

      - name: Cache Composer Dependencies
        uses: actions/cache@v4
        with:
          path: vendor
          key: ${{ runner.os }}-composer-${{ hashFiles('**/composer.lock') }}
          restore-keys: |
            ${{ runner.os }}-composer-

      - name: Install Composer Dependencies
        run: |
          composer install --no-dev --prefer-dist --optimize-autoloader --no-interaction --no-progress

      - name: Setup Node.js
        uses: actions/setup-node@v4
        with:
          node-version: 20
          cache: 'npm'

      - name: Install NPM Dependencies & Build Assets
        run: |
          npm ci || npm install
          npm run build

      - name: Setup SSH Key
        uses: webfactory/ssh-agent@v0.9.0
        with:
          ssh-private-key: ${{ secrets.CPANEL_SSH_KEY }}

      # ১. ব্যাকএন্ড ফাইল cPanel প্রজেক্ট ফোল্ডারে পাঠানো (tar over SSH)
      - name: Deploy Backend to cPanel (portfolio folder)
        run: |
          tar -czf - \
            --exclude='.git*' \
            --exclude='.env' \
            --exclude='.env.*' \
            --exclude='storage' \
            --exclude='node_modules' \
            --exclude='tests' \
            --exclude='phpunit.xml' \
            . | ssh -p ${{ secrets.CPANEL_SSH_PORT || 22 }} -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ${{ secrets.CPANEL_SSH_USER }}@${{ secrets.CPANEL_SSH_HOST }} "mkdir -p /home/${{ secrets.CPANEL_SSH_USER }}/portfolio && tar -xzf - -C /home/${{ secrets.CPANEL_SSH_USER }}/portfolio"

      # ২. ফ্রন্টএন্ড Vite বিল্ড ও অ্যাসেট public_html-এ পাঠানো (index.php ও .htaccess সুরক্ষিত রেখে)
      - name: Deploy Public Assets to public_html
        run: |
          tar -czf - \
            --exclude='index.php' \
            --exclude='.htaccess' \
            --exclude='.well-known' \
            --exclude='storage' \
            -C public . | ssh -p ${{ secrets.CPANEL_SSH_PORT || 22 }} -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ${{ secrets.CPANEL_SSH_USER }}@${{ secrets.CPANEL_SSH_HOST }} "mkdir -p /home/${{ secrets.CPANEL_SSH_USER }}/public_html && tar -xzf - -C /home/${{ secrets.CPANEL_SSH_USER }}/public_html"

      # ৩. মাইগ্রেশন ও ক্যাশ অপটিমাইজেশন রান করা
      - name: Execute Post-Deployment Commands on cPanel
        run: |
          ssh -p ${{ secrets.CPANEL_SSH_PORT || 22 }} -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null ${{ secrets.CPANEL_SSH_USER }}@${{ secrets.CPANEL_SSH_HOST }} << 'EOF'
            set -e
            cd /home/${{ secrets.CPANEL_SSH_USER }}/portfolio

            # Ensure storage directories exist with correct permissions
            mkdir -p storage/framework/{sessions,views,cache} storage/logs bootstrap/cache
            chmod -R 775 storage bootstrap/cache

            # Run database migrations and cache optimizations
            php artisan migrate --force
            php artisan optimize:clear
            php artisan config:cache
            php artisan route:cache
            php artisan view:cache
          EOF
```

---

### ধাপ ৪: কোড পুশ করা ও ডিপ্লয়মেন্ট পর্যবেক্ষণ

আপনার লোকাল মেশিনে কোড কমিট করে `master` ব্রাঞ্চে পুশ করুন:

```bash
git add .
git commit -m "Automate cPanel deployment via GitHub Actions"
git push origin master
```

এরপর GitHub রিপোজিটরির **Actions** ট্যাবে গেলে দেখতে পাবেন ডিপ্লয়মেন্ট স্বয়ংক্রিয়ভাবে চলছে এবং সবুজ টিকচিহ্ন (Green Checkmark 🟢) দিয়ে সফলভাবে শেষ হচ্ছে।

---

## 💡 বহুল প্রচলিত সমস্যা ও সমাধান (Troubleshooting & Gotchas)

1. **`Command failed: ssh-add - Enter passphrase for (stdin):`**
   - **কারণ:** SSH Key তৈরির সময় পাসওয়ার্ড দেওয়া হয়েছিল।
   - **সমাধান:** `ssh-keygen -N ""` দিয়ে খালি পাসফ্রেজ বিশিষ্ট কী তৈরি করে GitHub Secrets-এ প্রাইভেট কী আপডেট করতে হবে।

2. **`bash: line 1: rsync: command not found`:**
   - **কারণ:** বেশিরভাগ cPanel শেয়ার্ড হোস্টিংয়ে নিরাপত্তার জন্য `rsync` বন্ধ বা অনুপস্থিত থাকে।
   - **সমাধান:** `rsync`-এর বদলে লিনাক্সের বিল্ট-ইন `tar` ওভার SSH স্ট্রিমিং ব্যবহার করা হয়েছে। এটি পৃথিবীর যেকোনো লিনাক্স বা cPanel সার্ভারে ১০০% কাজ করে এবং দ্রুত ফাইল ট্রান্সফার করে।

3. **`kex_exchange_identification: Connection reset by peer`:**
   - **কারণ:** ডিফল্ট পোর্ট `22` সার্ভার ফায়ারওয়াল দ্বারা বন্ধ থাকে।
   - **সমাধান:** হোস্টিং প্রোভাইডারের দেওয়া কাস্টম SSH পোর্টটি `CPANEL_SSH_PORT` সিক্রেটে ব্যবহার করতে হবে।

4. **`Temporary failure in name resolution` বা দীর্ঘ সময় আটকে থাকা:**
   - **কারণ:** `CPANEL_SSH_HOST` বা `CPANEL_SSH_PORT` সিক্রেটে কোনো অতিরিক্ত লেখা, স্পেস বা ব্র্যাকেটের ভেতরের লেখা চলে আসা।
   - **সমাধান:** হোস্টের ঘরে শুধুমাত্র আইপি বা ডোমেইন এবং পোর্টের ঘরে শুধুমাত্র সংখ্যামান রাখতে হবে। এছাড়া `-o StrictHostKeyChecking=no` ব্যবহার করায় কোনো হোস্ট ভেরিফিকেশন জট তৈরি হয় না।

---

> 🎯 **ভবিষ্যতে অন্য প্রজেক্টে ব্যবহারের নিয়ম:**  
> যেকোনো নতুন Laravel প্রজেক্টে শুধু `.github/workflows/deploy.yml` ফাইলটি রাখবেন এবং ফোল্ডারের নাম (যেমন: `portfolio`-এর জায়গায় নতুন প্রজেক্টের নাম) পরিবর্তন করে GitHub Secrets সেট করলেই স্বয়ংক্রিয় ডিপ্লয়মেন্ট চালু হয়ে যাবে!
