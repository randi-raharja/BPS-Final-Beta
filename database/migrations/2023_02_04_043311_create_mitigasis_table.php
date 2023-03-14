<?php

use App\Models\Fungsi;
use App\Models\Sumber;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitigasis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(User::class, 'verif_by')->nullable();
            $table->foreignIdFor(Fungsi::class);
            $table->string('kegiatan');
            $table->string('risk');
            $table->string('sebab');
            $table->foreignIdFor(Sumber::class);
            $table->string('dampak');
            $table->string('nilai_peluang');
            $table->string('nilai_dampak');
            $table->string('mitigasi');
            $table->timestamps();
            $table->boolean('is_verif')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitigasis');
    }
};
