<div id="addBazaarModal" style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.4); z-index:9999;">
    <div style="background: linear-gradient(135deg, #ec6da9 0%, #a259c3 100%); max-width:500px; margin:10vh auto; padding:2rem; border-radius:12px; position:relative; box-shadow:0 4px 24px #ec6da955; color:#fff;">
        <h2 style="color:#fff; margin-bottom:1rem;">إضافة بازار جديد</h2>
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" style="color:#155724; background:#d4edda; border-color:#c3e6cb;">
                {{ session('message') }}
            </div>
        @endif
        @livewire('bazaar-form')
        <script>
        window.addEventListener('closeBazaarModal', () => {
            document.getElementById('addBazaarModal').style.display = 'none';
        });
        </script>
        <span onclick="document.getElementById('addBazaarModal').style.display='none';" style="position:absolute;top:10px;right:16px;cursor:pointer;font-size:22px;color:#fff;">&times;</span>
    </div>
</div>
