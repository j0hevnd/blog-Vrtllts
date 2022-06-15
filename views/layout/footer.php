    <footer id="footer_id">
        Blog de desarrollo web Esteban García | Todos los derechos reservados &copy;
    </footer>

    <?php if(isset($get_controller) && $get_controller === 'user'): ?>
        <script src="<?=BASE_URL?>assets/js/login.js"></script>
    <?php else: ?>    
        <script src="<?=BASE_URL?>assets/js/main.js"></script>
    <?php endif; ?>    
    </body>

</html>