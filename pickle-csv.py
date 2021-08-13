import csv
r = csv.reader(open('gooddata.csv'))
lines = list(r)
print(lines[1][0])
for x in range(0,len(lines)):
    if(lines[x][0].find('-')>0):
        lines[x][0] = lines[x][0][:lines[x][0].find('-')-1]
csvfile = "good_data2.csv"
with open(csvfile, "w") as output:
    writer = csv.writer(output, lineterminator='\n')
    for val in lines:
        writer.writerow(val)
