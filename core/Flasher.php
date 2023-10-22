<?php

class Flasher
{
    public static function setFlash($message, $type = 'success')
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show position-fixed z-3" style="bottom: 1rem; right: 2rem; z-index: 99;" role="alert">
                ' . $_SESSION['flash']['message'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}
