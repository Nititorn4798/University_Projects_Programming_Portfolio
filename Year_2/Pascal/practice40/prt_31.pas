program prt_31;
uses
  crt;
var
  Prices : Real;
  Total : Real;
  CustomCode : Char;
  discount : real;
begin
  ClrScr;
  Write('Input Customer Code : ');
  ReadLn(CustomCode);
  Write('Input Prices : ');
  ReadLn(Prices);

  case (CustomCode) Of
    'A', 'a' :
      begin
        if Prices < 10000 then
        begin
          discount := 0.03;
        end
        else if Prices < 40000 then
        begin
          discount := 0.05;
        end
        else if Prices >= 40000 then
        begin
          discount := 0.1;
        end;
      end;
    'B', 'b' :
      begin
        if Prices < 10000 then
        begin
          discount := 0.0;
        end
        else if Prices < 40000 then
        begin
          discount := 0.03;
        end
        else if Prices >= 40000 then
        begin
          discount := 0.05;
        end;
      end;
    else
    begin
      WriteLn('Input Out Of Range.');
      Prices := 0;
    end;
  end;

  if Prices > 0 then
  begin
    total := Prices - (Prices * discount);
    WriteLn('Total Prices is ',total:0:2);
  end;
  ReadLn;
end.