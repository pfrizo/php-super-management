<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableWebsiteContactsAddFkContactTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('website_contacts', function(Blueprint $table) {
            $table->unsignedBigInteger('contact_type_id');
        });

        DB::statement('update website_contacts set contact_type_id = contact_type');

        Schema::table('website_contacts', function(Blueprint $table) {
            $table->foreign('contact_type_id')->references('id')->on('contact_types');
            $table->dropColumn('contact_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('website_contacts', function(Blueprint $table) {
            $table->integer('contact_type');
            $table->dropForeign('website_contacts_contact_type_id_foreign');
        });

        DB::statement('update website_contacts set contact_type = contact_type_id');

        Schema::table('website_contacts', function(Blueprint $table) {
            $table->dropColumn('contact_type_id');
        });
    }
}
