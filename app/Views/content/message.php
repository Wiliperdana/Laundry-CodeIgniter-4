<?php if(session()->has("success")): ?>
    <div class="alert alert-success" id="successMessage">
        <?= session('success') ?>
    </div>
    
    <script>
        setTimeout(function() {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000);
    </script>
<?php endif;