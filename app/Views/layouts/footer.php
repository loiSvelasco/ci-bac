<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>About</h5>
        <p>BAC Monitoring Application</p>
        <p>Designed by Louis Velasco</p>
    </div>
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Made with ❤
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy;
        <?php
            $fromYear = 2022;
            $thisYear = (int)date('Y');
            echo $fromYear . (($fromYear < $thisYear) ? '-' . $thisYear : '');
        ?>
        <a href="https://github.com/loiSvelasco" target="_blank">Louis Velasco</a>.
    </strong> All rights reserved.
</footer>