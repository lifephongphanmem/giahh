<?php namespace App\Providers;

class BladeExtensions {

    public static function register()
    {

        \Blade::extend(function($value, $compiler)
        {
            $pattern = $compiler->createMatcher('nlbr');
            return preg_replace($pattern, '$1<?php echo nl2br(e($2)); ?>', $value);
        });
    }

}