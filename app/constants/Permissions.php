<?php

namespace App\constants;

class Permissions
{
    // Skema
    // const CREATE_
    // const READ_
    // const UPDATE_
    // const DELETE_

    // User
    const CREATE_USER = 'create_user';
    const READ_USER = 'read_user';
    const UPDATE_USER = 'update_user';
    const DELETE_USER = 'delete_user';

    // Mitigasi
    const CREATE_MITIGASI = 'create_mitigasi';
    const READ_MITIGASI = 'read_mitigasi';
    const UPDATE_MITIGASI = 'update_mitigasi';
    const DELETE_MITIGASI = 'delete_mitigasi';

    // Answer
    const UPDATE_ANSWER = 'update_answer';

    // Verifikasi
    const UPDATE_VERIFIKASI = 'update_verifikasi';

    // Print
    const PRINT_MITIGASI = 'print_mitigasi';

    // Role
    const CREATE_ROLE = 'create_role';
    const READ_ROLE = 'read_role';
    const UPDATE_ROLE = 'update_role';
    const DELETE_ROLE = 'delete_role';

    // IKM
    const READ_IKM = 'read_ikm';
    const EXPORT_IKM = 'export_ikm';

    // NIDN
    const UPDATE_NIDN = 'update_nidn';

    public static function all()
    {
        return collect([
            // User
            self::CREATE_USER => 'Membuat user',
            self::READ_USER => 'Melihat data user',
            self::UPDATE_USER => 'Update data user',
            self::DELETE_USER => 'Menghapus user',
            // Mitigasi
            self::CREATE_MITIGASI => 'Membuat Mitigasi',
            self::READ_MITIGASI => 'Membaca data mitigasi',
            self::UPDATE_MITIGASI => 'Update data mitigasi',
            self::DELETE_MITIGASI => 'Menghapus data mitigasi',
            // Answer
            self::UPDATE_ANSWER => 'Menjawab laporan masuk',
            // Verifikasi
            self::UPDATE_VERIFIKASI => 'Verifikasi data mitigasi',
            // Print
            self::PRINT_MITIGASI => 'Print data mitigasi',
            // Role
            self::CREATE_ROLE => 'Membuat role',
            self::READ_ROLE => 'Membaca data role',
            self::UPDATE_ROLE => 'Update role',
            self::DELETE_ROLE => 'Delete role',
            // IKM
            self::READ_IKM => 'Membaca data IKM',
            self::EXPORT_IKM => 'Export data IKM',
            // NIDN
            self::UPDATE_NIDN => 'Dapat menambahkan NIDN dan TTD',
        ]);
    }
}
