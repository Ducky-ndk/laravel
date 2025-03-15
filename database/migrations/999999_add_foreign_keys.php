<?php

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
        Schema::table('sport_classes', function(Blueprint $table) {
            $table->foreign('subscription_id')->references('id')->on('subscriptions')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });

        Schema::table('cancelled', function(Blueprint $table) {
            $table->foreign('lesson_id')->references('id')->on('lessons')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::table('participants', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
            $table->foreign('lesson_id')->references('id')->on('lessons')
                ->cascadeOnUpdate()
                ->nullOnDelete();
        });

        Schema::table('instructors', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });

        Schema::table('lessons', function(Blueprint $table) {
            $table->foreign('sport_class_id')->references('id')->on('sport_classes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('instructor_id')->references('id')->on('instructors')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreign('location_id')->references('id')->on('locations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });


        Schema::table('role_user', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreign('role_id')->references('id')->on('roles')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('role_user', function(Blueprint $table) {
            $table->dropForeign('user_roles_user_id_foreign');
            $table->dropForeign('user_roles_role_id_foreign');
        });

        Schema::table('classes', function(Blueprint $table) {
            $table->dropForeign('posts_user_id_foreign');
        });

        Schema::table('cancelled', function(Blueprint $table) {
            $table->dropForeign('cancelled_lesson_id_foreign');
        });

        Schema::table('participants', function(Blueprint $table) {
            $table->dropForeign('participants_user_id_foreign');
            $table->dropForeign('participants_lesson_id_foreign');
        });

        Schema::table('instructors', function(Blueprint $table) {
            $table->dropForeign('instructors_user_id_foreign');
        });

        Schema::table('lessons', function(Blueprint $table) {
            $table->dropForeign('lessons_class_id_foreign');
            $table->dropForeign('lessons_instructor_id_foreign');
            $table->dropForeign('lessons_location_id_foreign');
        });
    }
};
