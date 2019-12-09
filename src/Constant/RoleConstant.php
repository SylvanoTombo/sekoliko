<?php
/**
 * Julien Rajerison <julienrajerison5@gmail.com>.
 **/

namespace App\Constant;

/**
 * Class RoleConstant.
 */
class RoleConstant
{
    public const ROLE_SEKOLIKO = [
        'Administrateur' => 'ROLE_ADMIN',
        'Professeur'     => 'ROLE_PROFS',
        'Etudiant'       => 'ROLE_ETUDIANT',
        'Direction'      => 'ROLE_DIRECTION',
        'SuperAdmin'     => 'ROLE_SUPER_ADMIN',
        'Scolarite'      => 'ROLE_SCOLARITE',
    ];

    public const ROLE_PROFS = 1;
}
