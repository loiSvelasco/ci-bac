<script>
    <?php if (session()->has('warning')): ?>
        toastr.warning('<?= session('warning'); ?>')
    <?php endif ?>
    <?php if (session()->has('info')): ?>
        toastr.info('<?= session('info'); ?>')
    <?php endif ?>
    <?php if (session()->has('success')): ?>
        toastr.success('<?= session('success'); ?>')
    <?php endif ?>
</script>