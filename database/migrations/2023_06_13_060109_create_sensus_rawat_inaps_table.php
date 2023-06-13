<?php

use App\Enums\CaraDatang;
use App\Enums\Gender;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sensus_rawat_inaps', function (Blueprint $table) {
            $table->id();
            $table->datetime('tgl_mrs')->default(now());
            $table->string('nama');
            $table->enum('gender', array_column(Gender::cases(), 'value'))->default(Gender::male->value)->comment('0 -> male, 1 -> female');
            $table->unsignedInteger('age');
            $table->string('no_rm');
            $table->enum('cara_datang', array_column(CaraDatang::cases(), 'value'));
            $table->text('alamat');
            $table->string('diagnosa');
            $table->string('diagnosa_mrs');
            $table->string('diagnosa_krs');
            $table->datetime('tgl_krs')->default(now());
            $table->boolean('hp')->default(false)->comment('true -> checked, false -> unchecked');
            $table->boolean('krs')->default(false)->comment('true -> checked, false -> unchecked');
            $table->boolean('aps')->default(false)->comment('true -> checked, false -> unchecked');
            $table->boolean('m')->default(false)->comment('true -> checked, false -> unchecked');
            $table->boolean('rjk')->default(false)->comment('true -> checked, false -> unchecked');
            $table->boolean('pdh')->default(false)->comment('true -> checked, false -> unchecked');
            $table->string('cara_bayar');
            $table->string('dpjp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensus_rawat_inaps');
    }
};
