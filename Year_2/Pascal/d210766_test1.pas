program 
  d210766_test1;
uses crt;
var
  value1 : Integer;
  realN : Real;
  boolee1 , boolee2 : Boolean;
  charG1 : Char;
  stringSS : String;
begin
  clrscr;
  value1 := 100;
  realN := 1.09;
  boolee1 := True;
  boolee2 := 10 > 11;
  charG1 := 'H';
  stringSS := 'Hello Welcome';
  WriteLn(stringSS,' ',charG1,' ',value1,' ',realN:3:2,' ',boolee1,' ',boolee2)
end.

