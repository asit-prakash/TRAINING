<?php
    class student_details
    {
        
    }
    $student=[
        0=>[
            "name"=>"a",
            "gender"=>"m"
        ],
        1=>[
            "name"=>"b",
            "gender"=>"m"
        ],
        2=>[
            "name"=>"c",
            "gender"=>"m"
        ],
        3=>[
            "name"=>"d",
            "gender"=>"m"
        ],
        4=>[
            "name"=>"e",
            "gender"=>"m"
        ],
        5=>[
            "name"=>"f",
            "gender"=>"m"
        ],
        6=>[
            "name"=>"g",
            "gender"=>"m"
        ],
        7=>[
            "name"=>"h",
            "gender"=>"f"
        ],
        8=>[
            "name"=>"i",
            "gender"=>"f"
        ],
        9=>[
            "name"=>"j",
            "gender"=>"f"
        ]
        ];

   foreach($student as $key=>$value)
        {
            foreach($student[$key] as $key2=>$value2)
            {
                if($value2 =='m')
                {
                    echo "male";
                }
            }
        }
?>