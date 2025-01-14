program prt_21;
uses
  crt;
var
  nameStr : String;
  bornYearInt : Integer;
  age : Integer;
begin
  ClrScr;
  Write('Input Your Name : ');
  read(nameStr);
  Write('Input Your Born Year In B.E. : ');
  read(bornYearInt);
  age := 2566 - bornYearInt;
  WriteLn('Your Age is ', age);
  if age >= 20 then
  begin
    WriteLn('Adult')
  end
  else
  begin
    WriteLn('Child')
  end;
  ReadLn;
end.