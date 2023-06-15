<?php
require '../constant.php';

// require config file
require dir_admin . '/config/database.php';

// require models file
require dir_admin . '/models/product.php';
require dir_admin . '/models/user.php';

// require controllers file
require dir_admin . '/controllers/handle_product.php';
require dir_admin . '/controllers/handle_account.php';

// require views file
require dir_admin . '/views/backend_panel.php';