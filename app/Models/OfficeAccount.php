<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;



class OfficeAccount extends Authenticatable
{
    use HasFactory;

    protected $guard = 'office';

    public $table = "office";
    public $primaryKey = "id";
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    public const PK = 'id';





    /*
     * get the etablissement
     */
//    public function etablissement()
//    {
//        return $this->belongsTo(Etablissement::class, 'etablissements', 'idEta');
//    }


    /*
     * reset all rows password to the email
     */
//    public static function resetPasswords()
//    {
//        self::all()->each(function (\App\Models\Admin\OfficeAccount $account) {
//            if (empty($account['login'])) {
//                $faker = new Faker();
//                $account->update([
//                    'login' => $faker->faker()->email()
//                ]);
//            }
//            $account->update([
//                'pswrd' => \Hash::make($account['login'])
//            ]);
//        });
//    }


    /*
     *
     */
//    public function getCabinetAbonment()
//    {
//        if (ConnectedOffice::isConnected()) {
//            return CentreFormationAbonnement::query()
//                ->where(CentreFormationAbonnement::PK, ConnectedOffice::getOffice()['idCenterAbn']);
//        }
//
//        throw new Exception('office must be connected');
//    }

    /***
     * chnage office login status
     * @param bool $status
     * @return void
     */
    public function changeLoginStatus(bool $status): void
    {
        $this->update([
            'isConnected' => $status
        ]);

    }

    /***
     * make office account offline
     * @return void
     */
    public function makeAccountOffline(): void
    {
        $this->changeLoginStatus(false);
    }

    /***
     * make office accout live
     * @return void
     */
    public function makeAccountConnected(): void
    {
        $this->changeLoginStatus(true);
    }

}
