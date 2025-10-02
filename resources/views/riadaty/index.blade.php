<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رياضتي - منصة HAGTY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home-enhancements.css') }}">
    <style>body { font-family: 'Cairo', sans-serif; }</style>
</head>
<body class="bg-gradient-to-br from-orange-50 to-red-50">
    @include('components.shared-header')

    <section class="bg-gradient-to-r from-orange-600 to-red-600 text-white py-24">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">🏃‍♀️ رياضتي</h1>
            <p class="text-xl md:text-2xl">رحلتك نحو جسم صحي ونشيط</p>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-12 max-w-4xl mx-auto">
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $workouts->count() }}</div>
                    <div class="text-sm">تمرين</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $plans->count() }}</div>
                    <div class="text-sm">خطة تدريب</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $videos->count() }}</div>
                    <div class="text-sm">فيديو تعليمي</div>
                </div>
                <div class="bg-white bg-opacity-20 rounded-lg p-4">
                    <div class="text-3xl font-bold">{{ $challenges->count() }}</div>
                    <div class="text-sm">تحدي نشط</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Workouts -->
    @if($workouts->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🧘‍♀️ جداول <span style="color: #d94288">التمارين</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($workouts as $workout)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all border-2 border-transparent hover:border-orange-500">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center ml-4">
                                <i class="fas fa-dumbbell text-2xl text-orange-600"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-xl">{{ $workout->title }}</h3>
                                <span class="text-sm text-orange-600 font-semibold">{{ $workout->workout_type }}</span>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">{{ Str::limit($workout->description, 100) }}</p>
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm text-gray-600"><i class="far fa-clock ml-1"></i>{{ $workout->duration_minutes }} دقيقة</span>
                            <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-xs">{{ $workout->difficulty_level }}</span>
                        </div>
                        @if($workout->calories_burned)
                        <div class="text-sm text-gray-600"><i class="fas fa-fire ml-1 text-red-500"></i>{{ $workout->calories_burned }} سعرة حرارية</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Training Plans -->
    @if($plans->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">📅 خطط <span style="color: #d94288">التدريب</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($plans as $plan)
                <div class="bg-white rounded-lg shadow-lg p-8 hover:shadow-2xl transition-all">
                    <h3 class="font-bold text-2xl mb-3">{{ $plan->plan_name }}</h3>
                    <p class="text-gray-600 mb-4">{{ $plan->description }}</p>
                    <div class="space-y-2 mb-6">
                        <div class="flex items-center text-gray-700"><i class="fas fa-calendar-alt ml-2 text-orange-600"></i>{{ $plan->duration_weeks }} أسبوع</div>
                        <div class="flex items-center text-gray-700"><i class="fas fa-layer-group ml-2 text-orange-600"></i>{{ $plan->difficulty_level }}</div>
                        <div class="flex items-center text-gray-700"><i class="fas fa-tag ml-2 text-orange-600"></i>{{ $plan->plan_type }}</div>
                    </div>
                    <button onclick='openPlanModal(@json($plan))' class="w-full bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-lg hover:from-orange-700 hover:to-red-700 transition-all font-bold">ابدأ الخطة</button>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Nutrition Tips -->
    @if($nutritionTips->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🍏 نصائح <span style="color: #d94288">غذائية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($nutritionTips as $tip)
                <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-lg p-6 hover:shadow-xl transition-all">
                    <h3 class="font-bold text-lg mb-3">{{ $tip->title }}</h3>
                    <p class="text-gray-700 text-sm line-clamp-3">{{ Str::limit($tip->content, 120) }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Exercise Videos -->
    @if($videos->count() > 0)
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🎥 فيديوهات <span style="color: #d94288">التمارين</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($videos as $video)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-all">
                    <div class="relative">
                        <img src="{{ $video->thumbnail ? Storage::url($video->thumbnail) : 'https://via.placeholder.com/300x200?text=Video' }}" alt="{{ $video->title }}" class="w-full h-40 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                            <i class="fas fa-play-circle text-6xl text-white opacity-80"></i>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold mb-2">{{ $video->title }}</h3>
                        <p class="text-xs text-gray-600">{{ $video->exercise_type }} - {{ $video->duration_minutes }} دقيقة</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Challenges -->
    @if($challenges->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-8">🏆 التحديات <span style="color: #d94288">الرياضية</span></h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach($challenges as $challenge)
                <div class="bg-gradient-to-br from-yellow-50 to-orange-50 rounded-lg shadow-lg p-8 border-2 border-orange-200 hover:border-orange-500 transition-all">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-trophy text-4xl text-yellow-500 ml-4"></i>
                        <div>
                            <h3 class="font-bold text-2xl">{{ $challenge->challenge_name }}</h3>
                            <p class="text-orange-600 font-semibold">{{ $challenge->challenge_type }}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">{{ $challenge->description }}</p>
                    <div class="space-y-2 mb-6">
                        <div class="text-sm text-gray-600"><i class="far fa-calendar ml-1"></i>من {{ \Carbon\Carbon::parse($challenge->start_date)->format('Y/m/d') }} إلى {{ \Carbon\Carbon::parse($challenge->end_date)->format('Y/m/d') }}</div>
                        <div class="text-sm text-gray-600"><i class="fas fa-users ml-1"></i>{{ $challenge->participants_count }} مشارك</div>
                    </div>
                    <button onclick='openChallengeModal(@json($challenge))' class="w-full bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-3 rounded-lg hover:from-orange-700 hover:to-red-700 transition-all font-bold">
                        <i class="fas fa-user-plus ml-2"></i>انضم للتحدي
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Plan Start Modal -->
    <div id="planModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full">
            <div class="bg-gradient-to-r from-orange-600 to-red-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">
                        <i class="fas fa-rocket ml-2"></i>
                        ابدأ خطة التدريب
                    </h3>
                    <button onclick="closePlanModal()" class="text-white hover:text-gray-200 text-3xl">×</button>
                </div>
            </div>
            
            <div class="p-8">
                <div id="plan_details" class="mb-6">
                    <!-- سيتم ملؤها ديناميكياً -->
                </div>

                <form action="{{ route('riadaty.plan.start') }}" method="POST">
                    @csrf
                    <input type="hidden" id="plan_id" name="plan_id">
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">تاريخ البدء</label>
                        <input type="date" name="start_date" value="{{ date('Y-m-d') }}" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">ملاحظات شخصية</label>
                        <textarea name="notes" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500"
                                  placeholder="أي ملاحظات أو أهداف خاصة بك..."></textarea>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-orange-600 to-red-600 text-white px-6 py-4 rounded-lg hover:from-orange-700 hover:to-red-700 transition-all font-bold text-lg">
                            <i class="fas fa-play ml-2"></i>
                            ابدأ الآن
                        </button>
                        <button type="button" onclick="closePlanModal()" 
                                class="px-6 py-4 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all font-bold">
                            إلغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Challenge Join Modal -->
    <div id="challengeModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full">
            <div class="bg-gradient-to-r from-yellow-600 to-orange-600 text-white p-6 rounded-t-2xl">
                <div class="flex justify-between items-center">
                    <h3 class="text-2xl font-bold">
                        <i class="fas fa-trophy ml-2"></i>
                        انضم للتحدي
                    </h3>
                    <button onclick="closeChallengeModal()" class="text-white hover:text-gray-200 text-3xl">×</button>
                </div>
            </div>
            
            <div class="p-8">
                <div id="challenge_details" class="mb-6">
                    <!-- سيتم ملؤها ديناميكياً -->
                </div>

                <form action="{{ route('riadaty.challenge.join') }}" method="POST">
                    @csrf
                    <input type="hidden" id="challenge_id" name="challenge_id">
                    
                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">الاسم الكامل *</label>
                        <input type="text" name="participant_name" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500"
                               placeholder="أدخلي اسمك الكامل">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">البريد الإلكتروني *</label>
                        <input type="email" name="email" required
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500"
                               placeholder="example@email.com">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">رقم الهاتف</label>
                        <input type="tel" name="phone"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500"
                               placeholder="01XXXXXXXXX">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">لماذا تريدين المشاركة؟</label>
                        <textarea name="motivation" rows="3"
                                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500"
                                  placeholder="شاركي سبب رغبتك في الانضمام للتحدي..."></textarea>
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" 
                                class="flex-1 bg-gradient-to-r from-yellow-600 to-orange-600 text-white px-6 py-4 rounded-lg hover:from-yellow-700 hover:to-orange-700 transition-all font-bold text-lg">
                            <i class="fas fa-user-plus ml-2"></i>
                            انضم الآن
                        </button>
                        <button type="button" onclick="closeChallengeModal()" 
                                class="px-6 py-4 border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 transition-all font-bold">
                            إلغاء
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <div id="successMessage" class="hidden fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-8 py-4 rounded-lg shadow-lg z-50">
        <i class="fas fa-check-circle ml-2"></i>
        <span id="successText">تم بنجاح!</span>
    </div>


    <script>
        function openPlanModal(plan) {
            document.getElementById('plan_id').value = plan.id;
            
            const detailsHTML = `
                <div class="bg-orange-50 p-6 rounded-xl">
                    <h4 class="font-bold text-2xl text-orange-900 mb-3">${plan.plan_name}</h4>
                    <p class="text-gray-700 mb-4">${plan.description}</p>
                    <div class="grid grid-cols-3 gap-4 text-center">
                        <div class="bg-white p-3 rounded-lg">
                            <div class="text-2xl font-bold text-orange-600">${plan.duration_weeks}</div>
                            <div class="text-xs text-gray-600">أسبوع</div>
                        </div>
                        <div class="bg-white p-3 rounded-lg">
                            <div class="text-sm font-bold text-orange-600">${plan.difficulty_level}</div>
                            <div class="text-xs text-gray-600">المستوى</div>
                        </div>
                        <div class="bg-white p-3 rounded-lg">
                            <div class="text-sm font-bold text-orange-600">${plan.plan_type}</div>
                            <div class="text-xs text-gray-600">النوع</div>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('plan_details').innerHTML = detailsHTML;
            document.getElementById('planModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closePlanModal() {
            document.getElementById('planModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function openChallengeModal(challenge) {
            document.getElementById('challenge_id').value = challenge.id;
            
            const startDate = new Date(challenge.start_date).toLocaleDateString('ar-EG');
            const endDate = new Date(challenge.end_date).toLocaleDateString('ar-EG');
            
            const detailsHTML = `
                <div class="bg-yellow-50 p-6 rounded-xl border-2 border-yellow-200">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-trophy text-4xl text-yellow-500 ml-4"></i>
                        <div>
                            <h4 class="font-bold text-2xl text-gray-900">${challenge.challenge_name}</h4>
                            <p class="text-orange-600 font-semibold">${challenge.challenge_type}</p>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">${challenge.description}</p>
                    <div class="bg-white p-4 rounded-lg">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">📅 فترة التحدي:</span>
                            <span class="font-bold">${startDate} - ${endDate}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">👥 المشاركون:</span>
                            <span class="font-bold text-orange-600">${challenge.participants_count} مشارك</span>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('challenge_details').innerHTML = detailsHTML;
            document.getElementById('challengeModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeChallengeModal() {
            document.getElementById('challengeModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        // Close modals when clicking outside
        document.getElementById('planModal')?.addEventListener('click', function(event) {
            if (event.target === this) closePlanModal();
        });

        document.getElementById('challengeModal')?.addEventListener('click', function(event) {
            if (event.target === this) closeChallengeModal();
        });

        @if(session('success'))
            const msg = document.getElementById('successMessage');
            document.getElementById('successText').textContent = '{{ session('success') }}';
            msg.classList.remove('hidden');
            setTimeout(() => msg.classList.add('hidden'), 3000);
        @endif
    </script>

    <!-- Latest Blogs Section -->
    @if($latestBlogs && $latestBlogs->count() > 0)
    <section class="py-16 bg-gradient-to-br from-gray-50 to-green-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">📝 أحدث المقالات في رياضتي</h2>
                <p class="text-gray-600 text-lg">نصائح وأفكار مفيدة حول الرياضة واللياقة البدنية</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($latestBlogs as $blog)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    @if($blog->featured_image)
                        <div class="h-48 overflow-hidden">
                            <img src="{{ \Illuminate\Support\Str::startsWith($blog->featured_image, ['http', 'https']) ? $blog->featured_image : Storage::url($blog->featured_image) }}" 
                                 alt="{{ $blog->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                        </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="inline-block bg-green-100 text-green-800 text-xs px-3 py-1 rounded-full font-semibold">
                                {{ $blog->section_name }}
                            </span>
                            <span class="text-sm text-gray-500">
                                <i class="fas fa-clock ml-1"></i>
                                {{ $blog->published_at->diffForHumans() }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2">
                            <a href="{{ route('articles.show', $blog->slug) }}" class="hover:text-green-600 transition-colors duration-300">
                                {{ $blog->title }}
                            </a>
                        </h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ $blog->excerpt }}
                        </p>
                        
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-eye ml-1"></i>
                                <span>{{ $blog->views_count }} مشاهدة</span>
                                <i class="fas fa-clock mr-2 ml-4"></i>
                                <span>{{ $blog->reading_time }} دقيقة قراءة</span>
                            </div>
                            
                            <a href="{{ route('articles.show', $blog->slug) }}" 
                               class="inline-flex items-center text-green-600 hover:text-green-700 font-semibold transition-colors duration-300">
                                اقرأ المزيد
                                <i class="fas fa-arrow-left mr-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('articles.index') }}" 
                   class="inline-flex items-center bg-gradient-to-r from-green-600 to-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:from-green-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                    <i class="fas fa-newspaper ml-2"></i>
                    تصفح جميع المقالات
                </a>
            </div>
        </div>
    </section>
    @endif

    @include('components.shared-footer')
</body>
</html>
