<div class="fi-page-root" style="display: flex; flex-direction: row; gap: 2rem; align-items: flex-start;">
    <!-- تم حذف القائمة الجانبية -->
    <div style="flex: 1;">
        @include('filament.pages.rehlaaty.style-pink')
        <div class="pink-section">
            <h1>فيديوهات ترويجية للعروض والأماكسسسسن</h1>
            <a href="#" class="btn btn-pink" onclick="document.getElementById('addVideoModal').style.display='block';return false;">إضافة فيديو جديد</a>
            <!-- Modal -->
            <div id="addVideoModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:9999;">
                <div style="background:#fff; max-width:400px; margin:10vh auto; padding:2rem; border-radius:12px; position:relative;">
                    <h2 style="color:#e91e63; margin-bottom:1rem;">إضافة فيديو جديد</h2>
                    @livewire('promotion-video-form')
                    <span onclick="document.getElementById('addVideoModal').style.display='none';" style="position:absolute;top:10px;right:16px;cursor:pointer;font-size:22px;color:#e91e63;">&times;</span>
                </div>
            </div>
            <div>
                <!-- هنا يتم عرض الفيديوهات -->
            </div>
        </div>
    </div>
</div>
