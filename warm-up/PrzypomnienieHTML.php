<html>
    <header>
        <title></title>
        <meta charset="UTF-8"></meta>
    </header>
    <body>
        Zaczynaj projektować ;D

        <?php

    
        $a = 1; //zmienna całkowita
        $b = 5;
        $c = 1;

        $delta = (($b*$b) - 4 * ($a * $c));
        print("Delta: " . $delta);

        if($delta > 0){

            $x1 = (-$b - sqrt($delta)) / (2 * $a);
            $x2 = (-$b + sqrt($delta)) / (2 * $a);
            
            echo("\nx1: " . $x1);
            echo("\nx2: " . $x2);
        }
        else if($delta = 0){
            $x0 = -$b / (2 * $a);
            print("\nx0: " . $x0);
        }
        else{
            echo("\ndelta jest ujemna: brak miejsc zerowych");
        }
        ?>

    </body>
</html>