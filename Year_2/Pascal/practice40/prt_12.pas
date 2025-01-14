program prt_12;
uses
  crt,math; (* math for Floor() *)
const
  width = 25.0;
  length = 35.0;
var
  car : Real;
begin
  ClrScr;
  car := (((width * Length) - ((width * Length) * 0.1))) / (2 * 3.5);
  WriteLn('Can make ', Floor(car) ,' parking slots');
  ReadLn;
end.
