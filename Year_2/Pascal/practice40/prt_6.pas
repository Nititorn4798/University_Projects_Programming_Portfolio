program prt_6;
uses
  crt;
var
  centimeter : Real;
  q : Char;

function inch(centimeter:Real):Real;
  begin
    inch := centimeter * 0.393701;
  end;

begin
  repeat
    ClrScr;
    Write('Input Centimeter : ');
    ReadLn(centimeter);
    WriteLn('Inch : ',inch(centimeter):0:2);
    Write('Do you want to use the program again? [Y/N]: ');
    ReadLn(q);
  until (UpCase(q) <> 'Y');
end.
