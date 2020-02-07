<?php
    class st_details
    {
        public $index;
        public $name;
        public $gender;

        function __construct($index,$name,$gender)
        {
            $this->index=$index;
            $this->name=$name;
            $this->gender=$gender;
        }
        function getindex()
        {
            return $this->index;
        }
        function getname()
        {
            return $this->name;
        }
        function getgender()
        {
            return $this->gender;
        }
    }

    $ob1 = new st_details(0,'a','male');
    $ob2 = new st_details(1,'b','male');
    $ob3 = new st_details(2,'c','male');
    $ob4 = new st_details(3,'d','female');
    $ob5 = new st_details(4,'e','female');
    $ob6 = new st_details(5,'f','female');
    $ob7 = new st_details(6,'g','male');
    $ob8 = new st_details(7,'h','male');
    $ob9 = new st_details(8,'i','male');
    $ob10 = new st_details(9,'j','male');

    $st_dt=[
            $ob1->getindex()=>[
                'name'=>$ob1->getname(),
                'gender'=>$ob1->getgender()
            ],
            $ob2->getindex()=>[
                'name'=>$ob2->getname(),
                'gender'=>$ob2->getgender()
            ],
            $ob3->getindex()=>[
                'name'=>$ob3->getname(),
                'gender'=>$ob3->getgender()
            ],
            $ob4->getindex()=>[
                'name'=>$ob4->getname(),
                'gender'=>$ob4->getgender()
            ],
            $ob5->getindex()=>[
                'name'=>$ob5->getname(),
                'gender'=>$ob5->getgender()
            ],
            $ob6->getindex()=>[
                'name'=>$ob6->getname(),
                'gender'=>$ob6->getgender()
            ],
            $ob7->getindex()=>[
                'name'=>$ob7->getname(),
                'gender'=>$ob7->getgender()
            ],
            $ob8->getindex()=>[
                'name'=>$ob8->getname(),
                'gender'=>$ob8->getgender()
            ],
            $ob9->getindex()=>[
                'name'=>$ob9->getname(),
                'gender'=>$ob9->getgender()
            ],
            $ob10->getindex()=>[
                'name'=>$ob10->getname(),
                'gender'=>$ob10->getgender()
            ],
            ];

    foreach ($st_dt as $key=>$value)
    {
        if ($st_dt[$key]['gender'] == 'female') {
            echo $key;
            echo "<br>";
            echo $key++;
        }
    }
   echo "<pre>";
    print_r($st_dt);
    echo "</pre>";
?>