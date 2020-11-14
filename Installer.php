<?php

/**
 * Installer class.
 *
 * @license     https://nishchay.io/license New BSD License
 * @copyright   (c) 2020, Nishchay PHP Framework
 * @version     1.0
 * @author      Bhavik Patel
 */
class Installer
{

    /**
     * Path to application settings.
     * 
     * @var string 
     */
    private static $applicationFile = __DIR__ . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . 'configuration' . DIRECTORY_SEPARATOR . 'application.php';

    /**
     * Path to encryption settings.
     * 
     * @var string
     */
    private static $encryptionFile = __DIR__ . DIRECTORY_SEPARATOR . 'settings' . DIRECTORY_SEPARATOR . 'configuration' . DIRECTORY_SEPARATOR . 'encryption.php';

    /**
     * Ask user for application name and author name.
     * Also generates encryption key.
     * Then it updates settings content.
     * 
     * @param Composer\Script\Event $event
     */
    public static function install($event)
    {
        $io = $event->getIO();

        # Asking user for application name.
        $appName = $io->ask('Your application name:') ?? 'Nishchay Application';

        # Asking user for author name
        $authorName = $io->ask('Your/Organization name:') ?? 'Organization';

        # Fetchig application settings content and updating it.
        $contents = str_replace(['{APP_NAME}', '{AUTHOR_NAME}'], [$appName, $authorName], self::getApplicationContents());
        self::updateApplicationContents($contents);

        # Generating main and DB key.
        self::write('Generating ecryption key' . PHP_EOL);
        $mainKey = self::getRandomString(24);
        $dbKey = self::getRandomString(24);

        # Fetching encryption settings content and updating it.
        $contents = str_replace(['{PUT_YOUR_MAIN_KEY_HERE}', '{PUT_YOUR_DB_KEY_HERE}'], [$mainKey, $dbKey], self::getEncryptionContents());
        self::updateEncryptionContents($contents);

        self::write('Encryption generated.' . PHP_EOL . 'You can change generated encryption key.' . PHP_EOL);

        unlink(__FILE__);
    }

    /**
     * Generates random string of given length.
     * 
     * @param   int         $length
     * @return  string
     */
    private static function getRandomString($length)
    {
        $string = 'abcdefghijklmnopqrstuvwxyz0123456789-_@$:#ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random = '';
        $strlen = strlen($string) - 1;
        for ($i = 1; $i <= $length; $i++) {
            $random .= $string[mt_rand(0, $strlen)];
        }
        return $random;
    }

    /**
     * Returns text wrapped with green color code.
     * 
     * @param stirng $string
     * @param string $color
     * @return string
     */
    private static function getColorText($string)
    {
        return "\033[0;32m{$string}\033[0m";
    }

    /**
     * Writes in green color.
     * 
     * @param type $string
     */
    private static function write($string)
    {
        echo self::getColorText($string);
    }

    /**
     * Returns contents of application settings.
     * 
     * @return string
     */
    private static function getApplicationContents()
    {
        return file_get_contents(self::$applicationFile);
    }

    /**
     * Updates application setting content.
     * 
     * @param string $contents
     */
    private static function updateApplicationContents($contents)
    {
        file_put_contents(self::$applicationFile, $contents);
    }

    /**
     * Returns contents of encryption settings.
     * 
     * @return string
     */
    private static function getEncryptionContents()
    {
        return file_get_contents(self::$encryptionFile);
    }

    /**
     * Updates encryption setting content.
     * 
     * @param string $contents
     */
    private static function updateEncryptionContents($contents)
    {
        file_put_contents(self::$encryptionFile, $contents);
    }

}
