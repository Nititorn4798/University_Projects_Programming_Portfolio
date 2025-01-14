program prt_11;
uses
  crt;
var
  point : Integer;
  q : string;
function totalprice(point:Integer):Real;
  begin
    if (point > 0) then
    begin
      totalprice := 2500 + ((point - 1) * 500);
    end;
end;
begin
  repeat
    ClrScr;
    Write('Enter Number of Installation point : ');
    ReadLn(point);
    WriteLn('All satellite installation costs are : ',totalprice(point):0:3);
    Write('Do you want to use the program again? [Y/N]: ');
    ReadLn(q);
  until (UpCase(q) <> 'Y');
end.