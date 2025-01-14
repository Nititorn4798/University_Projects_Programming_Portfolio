import numpy
from scipy import stats

speed = [99,86,87,88,111,86,103,87,94,78,77,85,86]
speed = [1,7,3,5,6,7,4,2,8,7,6,5,7,11,21,23]

x = numpy.mean(speed)
print('mean', x)
x = numpy.median(speed)
print('median',x)
x = stats.mode(speed)
print('mode',x)