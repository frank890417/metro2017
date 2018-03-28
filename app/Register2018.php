<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register2018 extends Model
{
    //
    protected $table="registers2018";
    protected $fillable=["creator_count",
                        "concept_0_target",
                        "concept_0_content",
                        "concept_1_target",
                        "concept_1_content",
                        "concept_2_target",
                        "concept_2_content",
                        "work_0_name",
                        "work_0_content",
                        "work_0_file",
                        "work_1_name",
                        "work_1_content",
                        "work_1_file",
                        "work_2_name",
                        "work_2_content",
                        "work_2_file"];

}
