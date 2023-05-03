<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clientes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('idEndereco')->index('fk_clientes_endereco1_idx');
			$table->string('nome', 100);
			$table->string('cpf', 15);
			$table->string('telefone', 16);
			$table->string('email', 60);
			$table->date('dataNascimento');
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
		Schema::drop('clientes');
	}

}
