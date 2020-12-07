
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->decimal('amount');
            $table->unsignedBigInteger('clients_id');            
            $table->foreign('clients_id')->references('id')->on('individuals');
            $table->unsignedBigInteger('employee_id');            
            $table->foreign('employee_id')->references('id')->on('individuals');
            $table->unsignedBigInteger('sales_id');            
            $table->foreign('sales_id')->references('id')->on('sales');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
