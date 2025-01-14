program bubblesort;
uses
  crt;
var 
  A : Array[1..10] of Integer;
  J, I : Integer;
  T : Integer;
begin
  for I := 1 to 10 do
  begin
    Write('Input (',I,') : ');
    ReadLn(A[I]);
  end;

  for I := 1 to 9 do
  begin
    for J := 1 to (10-I) do
    begin
      if (A[J] > A[J+1]) then
      begin
        T := A[J];
        A[J] := A[J+1];
        A[J+1] := T;
      end;
    end;
  end;
  for I:= 1 to 10 do
  begin
    WriteLn('Data[',I,'] = ',A[I]);
  end;
end.
