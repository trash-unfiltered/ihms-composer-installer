<?php
/**
 * iHMS - internet Hosting Management system
 * Copyright (C) 2012 by iHMS Team
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * @category    iHMS
 * @package     iHMS_Composer
 * @copyright   2012 by iHMS Team
 * @author      Laurent Declercq <l.declercq@nuxwin.com>
 * @version     0.0.1
 * @link        https://github.com/i-HMS
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GPL v2
 */

namespace iHMS\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

/**
 * Installer class
 *
 * @package     iHMS_Composer
 * @copyright   2012 by iHMS Team
 * @author      Laurent Declercq <l.declercq@nuxwin.com>
 * @version     0.0.1
 */
class Installer extends LibraryInstaller
{
    /**
     * Decides if the installer supports the given type
     *
     * @param  string $packageType
     * @return bool
     */
    public function supports($packageType)
    {
        switch ($packageType) {
            case 'ihms-library':
                $ret = true;
                break;
            case 'ihms-module':
                $ret = true;
                break;
            case 'ihms-web':
                $ret = true;
                break;
            default:
                $ret = false;
        }

        return $ret;
    }

    /**
     * Returns the installation path of a package
     *
     * @throws \RuntimeException in case package type is unknown
     * @param  PackageInterface $package
     * @return string           path
     */
    public function getInstallPath(PackageInterface $package)
    {
        switch ($package->getType()) {
            case 'ihms-library':
                $installPath = '/usr/local/share/ihms';
                break;
            case 'ihms-module':
                $installPath = '/usr/local/share/ihms/module';
                break;
            case 'ihms-web':
                $installPath = '/var/www/ihms';
                break;
            default:
                throw new \RuntimeException('Unable to install package, package type not supported by installer');
        }

        return $installPath;
    }
}
