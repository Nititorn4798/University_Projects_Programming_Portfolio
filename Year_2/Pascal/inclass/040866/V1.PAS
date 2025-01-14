program aa;
uses crt;
var
   age : integer;
   fname , lname , sex , t1 : string[50];
begin
     clrscr;
     t1 := '___________________________';
     writeln(t1);
     write('Input Your First Name : ');
     readln(fname);
     write('Input Your Last  Name : ');
     readln(lname);
     write('Input Your Age : ');
     readln(age);
     write('Input Your Gender [M , F] : ');
     readln(sex);
     clrscr;
     writeln(t1);

     if ((sex = 'M') or (sex = 'm')) then
            write('Mr. ')
     else
            write('Ms. ');
     write(fname);
     write(' ');
     writeln(lname);
     write('Age ');
     write(age);
     writeln(' Year');
     if ((sex = 'M') or (sex = 'm')) then
            writeln('Sex Male')
     else
            writeln('Sex FeMale');
     write(t1);
     readln;
end.