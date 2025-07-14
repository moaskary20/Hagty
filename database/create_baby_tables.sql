-- إنشاء جداول البيانات للأطفال يدوياً

-- جدول خطوات الطفل اليومية
CREATE TABLE IF NOT EXISTS baby_day_steps (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    step_number INTEGER NOT NULL,
    age_group TEXT NOT NULL,
    category TEXT NOT NULL DEFAULT 'عام',
    difficulty_level TEXT,
    image TEXT,
    tips TEXT,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
);

-- جدول المعلومات الصحية للأطفال
CREATE TABLE IF NOT EXISTS baby_health_infos (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    category TEXT NOT NULL,
    age_range TEXT NOT NULL,
    source TEXT,
    image TEXT,
    tags TEXT,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
);

-- جدول نصائح خبراء الأطفال
CREATE TABLE IF NOT EXISTS baby_expert_advice (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    expert_name TEXT NOT NULL,
    expert_specialization TEXT NOT NULL,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    target_age TEXT NOT NULL,
    image TEXT,
    tips TEXT,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
);

-- جدول نصائح أطباء الأطفال
CREATE TABLE IF NOT EXISTS baby_doctor_tips (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    doctor_name TEXT NOT NULL,
    doctor_specialization TEXT NOT NULL,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    urgency_level TEXT NOT NULL,
    symptoms TEXT,
    age_group TEXT NOT NULL,
    image TEXT,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
);

-- جدول النمو الشهري للأطفال
CREATE TABLE IF NOT EXISTS baby_monthly_growths (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    month_number INTEGER NOT NULL,
    title TEXT NOT NULL,
    description TEXT NOT NULL,
    physical_development TEXT,
    cognitive_development TEXT,
    milestones TEXT,
    care_tips TEXT,
    image TEXT,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
);

-- جدول قائمة Baby Shower
CREATE TABLE IF NOT EXISTS baby_shower_lists (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    item_name TEXT NOT NULL,
    description TEXT NOT NULL,
    category TEXT NOT NULL,
    priority TEXT NOT NULL,
    estimated_price REAL,
    notes TEXT,
    is_purchased INTEGER NOT NULL DEFAULT 0,
    image TEXT,
    is_active INTEGER NOT NULL DEFAULT 1,
    created_at DATETIME,
    updated_at DATETIME
);

-- إدراج بيانات تجريبية

-- خطوات الطفل اليومية
INSERT OR IGNORE INTO baby_day_steps (title, description, step_number, age_group, category, difficulty_level, is_active, created_at, updated_at) VALUES
('تغيير الحفاظة', 'تغيير حفاظة الطفل كل 2-3 ساعات أو عند الحاجة. تأكدي من تنظيف المنطقة جيداً واستخدام كريم الحماية.', 1, '0-12 شهر', 'العناية اليومية', 'سهل', 1, datetime('now'), datetime('now')),
('الرضاعة', 'إطعام الطفل كل 2-3 ساعات. للرضاعة الطبيعية، تأكدي من الوضعية الصحيحة. للرضاعة الصناعية، اتبعي التعليمات.', 2, '0-6 أشهر', 'التغذية', 'متوسط', 1, datetime('now'), datetime('now')),
('النوم الآمن', 'ضعي الطفل على ظهره للنوم، في سرير منفصل، بدون وسائد أو بطانيات فضفاضة.', 3, '0-12 شهر', 'النوم', 'سهل', 1, datetime('now'), datetime('now')),
('وقت البطن', 'ضعي الطفل على بطنه لفترات قصيرة عندما يكون مستيقظاً لتقوية عضلات الرقبة والظهر.', 4, '1-6 أشهر', 'التطوير الحركي', 'متوسط', 1, datetime('now'), datetime('now'));

-- المعلومات الصحية
INSERT OR IGNORE INTO baby_health_infos (title, content, category, age_range, source, is_active, created_at, updated_at) VALUES
('أهمية الرضاعة الطبيعية', 'الرضاعة الطبيعية توفر جميع العناصر الغذائية التي يحتاجها طفلك في الأشهر الستة الأولى. كما تحمي من العدوى وتقوي جهاز المناعة.', 'التغذية', '0-6 أشهر', 'منظمة الصحة العالمية', 1, datetime('now'), datetime('now')),
('علامات الجفاف عند الأطفال', 'راقبي علامات الجفاف مثل قلة البلل في الحفاظة، جفاف الفم، البكاء بدون دموع، والخمول. اتصلي بالطبيب فوراً إذا لاحظت هذه العلامات.', 'الصحة العامة', '0-12 شهر', 'الأكاديمية الأمريكية لطب الأطفال', 1, datetime('now'), datetime('now')),
('التطعيمات المهمة', 'اتبعي جدول التطعيمات الموصى به من وزارة الصحة. التطعيمات تحمي طفلك من أمراض خطيرة ومعدية.', 'الوقاية', '0-24 شهر', 'وزارة الصحة السعودية', 1, datetime('now'), datetime('now'));

-- نصائح الخبراء
INSERT OR IGNORE INTO baby_expert_advice (expert_name, expert_specialization, title, content, target_age, tips, is_active, created_at, updated_at) VALUES
('د. فاطمة أحمد', 'أخصائية تربية الأطفال', 'بناء روتين يومي للطفل', 'إنشاء روتين ثابت يساعد الطفل على الشعور بالأمان ويسهل على الوالدين التنبؤ باحتياجاته. ابدئي بروتين بسيط للنوم والأكل.', '0-12 شهر', 'كوني مرنة في البداية، الثبات مع الوقت، راقبي إشارات طفلك', 1, datetime('now'), datetime('now')),
('د. محمد العلي', 'استشاري تطوير الطفل', 'تطوير مهارات التواصل المبكر', 'تحدثي مع طفلك منذ الولادة، اقرئي له، وغني له. هذا يساعد في تطوير مهارات اللغة والتواصل منذ وقت مبكر.', '0-18 شهر', 'استخدمي تعبيرات الوجه، كرري الأصوات، اقرئي يومياً', 1, datetime('now'), datetime('now'));

-- نصائح الأطباء
INSERT OR IGNORE INTO baby_doctor_tips (doctor_name, doctor_specialization, title, content, urgency_level, symptoms, age_group, is_active, created_at, updated_at) VALUES
('د. سارة الزهراني', 'طبيبة أطفال', 'متى يجب الاتصال بالطبيب', 'اتصلي بالطبيب فوراً إذا كان طفلك يعاني من حمى، صعوبة في التنفس، قيء مستمر، أو إذا كان يبدو مريضاً جداً.', 'عالي', 'حمى، صعوبة تنفس، قيء، خمول', '0-12 شهر', 1, datetime('now'), datetime('now')),
('د. أحمد المالكي', 'استشاري طب الأطفال', 'العناية بالحبل السري', 'حافظي على نظافة وجفاف منطقة الحبل السري. لا تستخدمي الكحول إلا إذا نصح الطبيب بذلك. سيسقط الحبل طبيعياً خلال 1-3 أسابيع.', 'متوسط', 'احمرار، رائحة كريهة، إفرازات', '0-1 شهر', 1, datetime('now'), datetime('now'));

-- النمو الشهري
INSERT OR IGNORE INTO baby_monthly_growths (month_number, title, description, physical_development, cognitive_development, milestones, care_tips, is_active, created_at, updated_at) VALUES
(1, 'الشهر الأول - مرحبا بالعالم', 'في الشهر الأول، يتكيف طفلك مع العالم الخارجي. ينام معظم الوقت ويحتاج للرضاعة كل 2-3 ساعات.', 'يزداد الوزن 150-200 جرام أسبوعياً، يفقد منعكس مورو تدريجياً', 'يبدأ في التركيز على الوجوه، يتفاعل مع الأصوات المألوفة', 'رفع الرأس لثوان قليلة، التحديق في الوجوه، الاستجابة للأصوات العالية', 'رضاعة منتظمة، نوم آمن، تفاعل لطيف', 1, datetime('now'), datetime('now')),
(2, 'الشهر الثاني - الابتسامات الأولى', 'يبدأ طفلك في إظهار ابتساماته الاجتماعية الأولى ويصبح أكثر تنبهاً لمحيطه.', 'تحسن في التحكم برفع الرأس، حركات أكثر سلاسة', 'ابتسامات اجتماعية، تتبع الأشياء بالعيون', 'الابتسام للآخرين، إصدار أصوات ناعمة، رفع الرأس 45 درجة', 'مزيد من وقت البطن، التحدث والغناء، اللعب البصري', 1, datetime('now'), datetime('now')),
(3, 'الشهر الثالث - الاكتشاف', 'يصبح طفلك أكثر تفاعلاً ويبدأ في اكتشاف يديه وصوته.', 'تحكم أفضل في الرأس والرقبة، بداية تحريك الذراعين بقصد', 'ضحك، تقليد بعض الحركات والأصوات', 'رفع الرأس والصدر في وقت البطن، إمساك الأشياء لفترة قصيرة', 'ألعاب تحفز الحواس، قراءة القصص، تنويع الأنشطة', 1, datetime('now'), datetime('now'));

-- قائمة Baby Shower
INSERT OR IGNORE INTO baby_shower_lists (item_name, description, category, priority, estimated_price, notes, is_purchased, is_active, created_at, updated_at) VALUES
('عربة أطفال', 'عربة أطفال آمنة ومريحة للتنقل مع الطفل', 'النقل', 'عالي', 800.00, 'يفضل أن تكون قابلة للطي وخفيفة الوزن', 0, 1, datetime('now'), datetime('now')),
('سرير أطفال', 'سرير آمن مع مرتبة مناسبة لحديثي الولادة', 'النوم', 'عالي', 1200.00, 'يجب أن يكون مطابقاً لمعايير السلامة', 0, 1, datetime('now'), datetime('now')),
('ملابس حديثي الولادة', 'مجموعة ملابس قطنية ناعمة مناسبة للأطفال الرضع', 'الملابس', 'عالي', 300.00, 'يفضل القطن الطبيعي، مقاسات مختلفة', 0, 1, datetime('now'), datetime('now')),
('مقعد سيارة للأطفال', 'مقعد سيارة آمن مخصص لحديثي الولادة', 'النقل', 'عالي', 600.00, 'ضروري قبل مغادرة المستشفى', 0, 1, datetime('now'), datetime('now')),
('زجاجات رضاعة', 'مجموعة زجاجات رضاعة مع حلمات مناسبة للأطفال', 'التغذية', 'متوسط', 150.00, 'خالية من BPA، سهلة التنظيف', 0, 1, datetime('now'), datetime('now')),
('حفاظات', 'مخزون من الحفاظات بمقاسات مختلفة', 'العناية', 'عالي', 400.00, 'احتياطي لعدة أشهر، مقاسات متنوعة', 0, 1, datetime('now'), datetime('now'));
