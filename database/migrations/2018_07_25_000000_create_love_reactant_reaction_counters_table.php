<?php

/*
 * This file is part of Laravel Love.
 *
 * (c) Anton Komarev <a.komarev@cybercog.su>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoveReactantReactionCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('love_reactant_reaction_counters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('reactant_id');
            $table->unsignedInteger('reaction_type_id');
            $table->unsignedInteger('count')->default('0');
            $table->timestamps();

            $table->index('reactant_id');
            $table->index('reaction_type_id');

            $table->foreign('reactant_id')->references('id')->on('love_reactants')
                ->onDelete('cascade');
            $table->foreign('reaction_type_id')->references('id')->on('love_reaction_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('love_reactant_reaction_counters');
    }
}
