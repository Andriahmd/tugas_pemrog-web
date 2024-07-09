<?php
class Navbar {
    private $items;

    public function __construct($items = []) {
        $this->items = $items;
    }

    public function render() {
        echo '<div class="sidebar bg-custom text-white p-3 fixed top-0 left-0 h-screen w-64">';
        echo '<h2 class="text-2xl mb-6">E-Cetring</h2>';
        echo '<ul class="nav flex-col">';
        foreach ($this->items as $item) {
            $activeClass = $item['active'] ? ' bg-gray-700' : '';
            echo '<li class="nav-item"><a href="' . $item['link'] . '" class="nav-link text-white p-3' . $activeClass . ' hover:bg-gray-600 rounded">' . $item['label'] . '</a></li>';
        }
        echo '</ul>';
        echo '</div>';
    }

    public static function addCSS() {
        echo '<style>
            .bg-custom {
                background-color: #45DFB1; /* Mengubah warna sidebar */
            }
            .main-content {
                margin-left: 250px;
            }
            @media (max-width: 768px) {
                .sidebar {
                    width: 100%;
                    height: auto;
                    position: relative;
                }
                .main-content {
                    margin-left: 0;
                }
            }
        </style>';
    }
}
?>