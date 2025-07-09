# منصة HAGTY - لوحة التحكم الإدارية

منصة إدارية متكاملة مبنية باستخدام Laravel 11 و FilamentPHP 3 مع دعم كامل للغة العربية (RTL).

## 🚀 المميزات

### ✨ الواجهة والتصميم
- **تعريب كامل**: جميع النصوص والواجهات بالعربية مع دعم RTL
- **تصميم داكن**: خلفية سوداء مع تدرجات وردية أنيقة
- **ألوان ديناميكية**: إمكانية تغيير اللون الأساسي من لوحة التحكم
- **إخفاء عناصر التوثيق**: شريط الوثائق وروابط GitHub مخفية

### 🎨 إدارة العلامة التجارية
- **لوجو قابل للتغيير**: رفع وتغيير اللوجو من لوحة التحكم
- **اسم الموقع الديناميكي**: تغيير اسم الموقع فوراً
- **معاينة مباشرة**: مشاهدة التغييرات قبل الحفظ
- **إعدادات متقدمة**: نظام إعدادات شامل ومرن

### 🔧 المكونات التقنية
- Laravel 11
- FilamentPHP 3.3.30
- دعم كامل للـ RTL
- نظام إعدادات ديناميكي
- خدمة الألوان الذكية

## 📋 متطلبات التشغيل

- PHP >= 8.1
- Composer
- Node.js & NPM
- SQLite (أو MySQL/PostgreSQL)

## 🛠️ التثبيت والتشغيل

### 1. استنساخ المشروع وتثبيت التبعيات

```bash
git clone [repository-url]
cd "HAGTY Platform"
composer install
npm install
```

### 2. إعداد قاعدة البيانات

```bash
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=SettingsSeeder
php artisan db:seed --class=AdminUserSeeder
```

### 3. إنشاء رابط التخزين

```bash
php artisan storage:link
```

### 4. تشغيل الخادم

```bash
php artisan serve
```

## 👤 بيانات الدخول الافتراضية

### مدير النظام
- **البريد الإلكتروني**: admin@hagty.com
- **كلمة المرور**: admin123

### مستخدم إضافي
- **البريد الإلكتروني**: mohamed@hagty.com
- **كلمة المرور**: mohamed123

## 🎛️ استخدام لوحة التحكم

### الوصول للوحة التحكم
```
http://localhost:8000/admin
```

### إدارة العلامة التجارية
1. اذهب إلى **الإعدادات** > **العلامة التجارية**
2. قم بتغيير:
   - اسم الموقع
   - رفع لوجو جديد (PNG, JPG, SVG - حتى 2MB)
   - اختيار اللون الأساسي
3. اضغط **حفظ الإعدادات**
4. ستظهر التغييرات فوراً في جميع الصفحات

### إدارة المستخدمين
- **عرض المستخدمين**: الإعدادات > المستخدمون
- **إضافة مستخدم جديد**: زر "مستخدم جديد"
- **تعديل المستخدمين**: اضغط على اسم المستخدم

## 🎨 تخصيص الألوان

### الألوان الافتراضية
- **اللون الأساسي**: `#eb6fab` (وردي)
- **خلفية التطبيق**: أسود
- **النصوص**: تدرجات وردية فاتحة

### تغيير اللون الأساسي
1. اذهب لصفحة العلامة التجارية
2. اختر لون جديد من منتقي الألوان
3. احفظ الإعدادات
4. سيتم توليد تدرجات اللون تلقائياً

## 📁 هيكل المشروع

```
HAGTY Platform/
├── app/
│   ├── Filament/
│   │   ├── Resources/           # موارد Filament
│   │   └── Pages/              # صفحات مخصصة
│   ├── Models/
│   │   └── Setting.php         # نموذج الإعدادات
│   ├── Services/
│   │   └── ColorService.php    # خدمة الألوان
│   └── Providers/
│       └── Filament/
│           └── AdminPanelProvider.php  # إعدادات لوحة التحكم
├── database/
│   ├── migrations/
│   │   └── create_settings_table.php   # جدول الإعدادات
│   └── seeders/                # بيانات أولية
├── lang/vendor/filament/ar/    # ملفات الترجمة العربية
├── public/
│   ├── css/
│   │   └── arabic-rtl.css     # أنماط RTL مخصصة
│   └── images/                # الصور واللوجوهات
└── resources/views/filament/   # قوالب Blade مخصصة
```

## 🔧 ملفات مهمة

### إعدادات لوحة التحكم
- `app/Providers/Filament/AdminPanelProvider.php`

### نموذج الإعدادات
- `app/Models/Setting.php`

### خدمة الألوان
- `app/Services/ColorService.php`

### صفحة العلامة التجارية
- `app/Filament/Resources/SettingResource/Pages/BrandingSettings.php`

### أنماط RTL
- `public/css/arabic-rtl.css`

### ملفات الترجمة
- `lang/vendor/filament/ar/`

## 🚀 إضافة مميزات جديدة

### إضافة إعداد جديد

```php
// في database seeder أو الكود
Setting::set('key_name', 'value', 'type', 'group');

// استخدام الإعداد
$value = Setting::get('key_name', 'default_value');
```

### تخصيص الألوان إضافياً

1. عدّل `ColorService::generateDynamicCSS()`
2. أضف متغيرات CSS جديدة
3. استخدمها في `arabic-rtl.css`

## 🐛 استكشاف الأخطاء

### مشكلة الألوان لا تتغير
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### مشكلة اللوجو لا يظهر
```bash
php artisan storage:link
```

### مشكلة الإعدادات لا تحفظ
تأكد من تشغيل migration الإعدادات:
```bash
php artisan migrate
```

## 📞 الدعم والمساعدة

للحصول على المساعدة أو الإبلاغ عن مشكلة، يرجى:
1. التحقق من الأخطاء في `storage/logs/`
2. التأكد من تشغيل جميع الـ migrations
3. التحقق من أذونات مجلد `storage/`

## 📜 الترخيص

هذا المشروع مرخص تحت رخصة MIT.

---

**منصة HAGTY** - حل شامل لإدارة المحتوى بالعربية 🚀
