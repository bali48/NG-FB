<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FriendRequestStatusForienKeyFriends extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('friends', function (Blueprint $table) {
//            $table->foreign('friendRequestStatus_id')->references('friendRequestStatus')->on('id');
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('friends', function (Blueprint $table) {
//            $table->dropForeign('friendRequestStatus_id');
//
//        });
    }
}
