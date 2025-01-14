program prt_26;
uses
  crt;
var
  Scores : Real;
begin
  ClrScr;
  Write('Input Your Scores : ');
  ReadLn(Scores);
  if (Scores <= 100) and (Scores >= 80) then
  begin
    WriteLn('Good')
  end
  else if (Scores <= 79) and (Scores >= 60) then
  begin
    WriteLn('Pass')
  end
  else if (Scores <= 59) and (Scores >= 0) then
  begin
    WriteLn('Fail')
  end;
  ReadLn;
end.