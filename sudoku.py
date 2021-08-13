#!/usr/bin/python3
import math

def get_bits(arr):
    arr_bits = 0
    for bit in range(0, 9):
        if arr[bit] > 0:
            arr_bits += 2 ** (arr[bit] - 1)
    return arr_bits


def get_columns(arr_num):
    col_arr = []
    for col in range(0, 3):
        col_nums = []
        for row in range(0, 9):
            col_nums.append(sample[row][((arr_num % 3) * 3) + col])
        col_arr.append(get_bits(col_nums))
    return col_arr


def get_rows(arr_num):
    row_arr = []
    for row in range(0, 3):
        row_nums = []
        for col in range(0, 9):
            row_nums.append(sample[((int)(arr_num / 3) * 3) + row][col])
        row_arr.append(get_bits(row_nums))
    return row_arr


def cube_solver(cube, cube_num):
    cube_bits = get_bits(cube)
    cube_temp_bits = cube_bits

    col_bits = get_columns(cube_num)
    row_bits = get_rows(cube_num)

    cube_temp = []
    poss_nums = []
    for x in range(0, len(cube)):
        cube_temp.append(cube[x])

    for row in range(0, 3):
        for col in range(0, 3):
            temp_poss_nums = []
            if cube[(row * 3) + col] != 0:
                temp_poss_nums.append(cube[(row * 3) + col])
            else:
                for x in range (1, 10):
                    bit = 2 ** (x - 1)
                    if bit & col_bits[col] == 0 and bit & row_bits[row] == 0 and bit & cube_bits == 0:
                        temp_poss_nums.append(x)
            poss_nums.append(temp_poss_nums)

    bits = []
    for x in range(0, len(poss_nums)):
        if len(poss_nums[x]) == 0 and cube_temp[x] == 0:
            return -1
        if cube_temp[x] != 0:
            bits.append(2 ** (cube_temp[x] - 1))
        else:
            bits.append(0)

    solutions = []
    for s0 in range(0, len(poss_nums[0])):
        bits[0] = 2 ** (poss_nums[0][s0] - 1)
        if poss_nums[0][s0] != cube_temp[0] and (bits[0] & cube_temp_bits > 0 or bits[0] & col_bits[0] > 0 or bits[0] & row_bits[0] > 0):
            continue

        for s1 in range(0, len(poss_nums[1])):
            if poss_nums[1][s1] == poss_nums[0][s0]:
                continue
            bits[1] = 2 ** (poss_nums[1][s1] - 1)
            if poss_nums[1][s1] != cube_temp[1] and (bits[1] & cube_temp_bits > 0 or bits[1] & col_bits[1] > 0 or bits[1] & row_bits[0] > 0):
                continue

            for s2 in range(0, len(poss_nums[2])):
                if poss_nums[2][s2] == poss_nums[0][s0] or poss_nums[2][s2] == poss_nums[1][s1]:
                    continue
                bits[2] = 2 ** (poss_nums[2][s2] - 1)
                if poss_nums[2][s2] != cube_temp[2] and (bits[2] & cube_temp_bits > 0 or bits[2] & col_bits[2] > 0 or bits[2] & row_bits[0] > 0):
                    continue

                for s3 in range(0, len(poss_nums[3])):
                    if poss_nums[3][s3] == poss_nums[0][s0] or poss_nums[3][s3] == poss_nums[1][s1] or poss_nums[3][s3] == poss_nums[2][s2]:
                        continue
                    bits[3] = 2 ** (poss_nums[3][s3] - 1)
                    if poss_nums[3][s3] != cube_temp[3] and (bits[3] & cube_temp_bits > 0 or bits[3] & col_bits[0] > 0 or bits[3] & row_bits[1] > 0):
                        continue

                    for s4 in range(0, len(poss_nums[4])):
                        bits[4] = 2 ** (poss_nums[4][s4] - 1)
                        if poss_nums[4][s4] != cube_temp[4] and (bits[4] & cube_temp_bits > 0 or bits[4] & col_bits[1] > 0 or bits[4] & row_bits[1] > 0):
                            continue

                        for s5 in range(0, len(poss_nums[5])):
                            bits[5] = 2 ** (poss_nums[5][s5] - 1)
                            if poss_nums[5][s5] != cube_temp[5] and (bits[5] & cube_temp_bits > 0 or bits[5] & col_bits[2] > 0 or bits[5] & row_bits[1] > 0):
                                continue

                            for s6 in range(0, len(poss_nums[6])):
                                bits[6] = 2 ** (poss_nums[6][s6] - 1)
                                if poss_nums[6][s6] != cube_temp[6] and (bits[6] & cube_temp_bits > 0 or bits[6] & col_bits[0] > 0 or bits[6] & row_bits[2] > 0):
                                    continue

                                for s7 in range(0, len(poss_nums[7])):
                                    bits[7] = 2 ** (poss_nums[7][s7] - 1)
                                    if poss_nums[7][s7] != cube_temp[7] and (bits[7] & cube_temp_bits > 0 or bits[7] & col_bits[1] > 0 or bits[7] & row_bits[2] > 0):
                                        continue

                                    for s8 in range(0, len(poss_nums[8])):
                                        bits[8] = 2 ** (poss_nums[8][s8] - 1)
                                        if poss_nums[8][s8] != cube_temp[8] and (bits[8] & cube_temp_bits > 0 or bits[8] & col_bits[2] > 0 or bits[8] & row_bits[2] > 0):
                                            continue
                                        temp_str = ""
                                        temp_bits = 0
                                        for x in range(0, len(bits)):
                                            temp_str += str(bits[x]) + " "
                                            temp_bits += bits[x]
                                        if temp_bits == 511:
                                            temp = []
                                            for x in range(0, len(bits)):
                                                temp.append(bits[x])
                                            solutions.append(temp)
    return solutions


def parse_bits(cube):
    temp = []
    for x in range(0, len(cube)):
        temp.append((int) (math.log(cube[x], 2) + 1))
    return temp


def print_cube(cube):
    rows = []
    rows.append("| " + str(cube[0]) + " | " + str(cube[1]) + " | " + str(cube[2]) + " |")
    rows.append("| " + str(cube[3]) + " | " + str(cube[4]) + " | " + str(cube[5]) + " |")
    rows.append("| " + str(cube[6]) + " | " + str(cube[7]) + " | " + str(cube[8]) + " |")
    return rows


def print_solution(solution):
    solution_print = ["=======================================", "", "", "", "=======================================",
                      "", "", "", "=======================================", "", "", "",
                      "======================================="]
    for cubes in range(9):
        cube = print_cube(solution[cubes])
        if cubes < 3:
            solution_print[1] += cube[0]
            solution_print[2] += cube[1]
            solution_print[3] += cube[2]
        elif cubes < 6:
            solution_print[5] += cube[0]
            solution_print[6] += cube[1]
            solution_print[7] += cube[2]
        else:
            solution_print[9] += cube[0]
            solution_print[10] += cube[1]
            solution_print[11] += cube[2]

    for line in range(13):
        print(solution_print[line])


sample = [[0, 2, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  6, 0, 0,  0, 0, 3],
         [0, 7, 4,  0, 8, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 3,  0, 0, 2],
         [0, 8, 0,  0, 4, 0,  0, 1, 0],
         [6, 0, 0,  5, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 1, 0,  7, 8, 0],
         [5, 0, 0,  0, 0, 9,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 4, 0]]

blank = [[0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0],
         [0, 0, 0,  0, 0, 0,  0, 0, 0]]
print("trying to solve this puzzle...")
print_solution(sample)


poss_squares = []
for cur_cube in range(9):
    print("working on solutions for square " + str(cur_cube + 1))
    cube_arr = []
    for row in range(0, 3):
        for col in range(0, 3):
            cube_arr.append(sample[((int) (cur_cube / 3) * 3) + row][((int) (cur_cube % 3) * 3) + col])
    poss_squares.append(cube_solver(cube_arr, cur_cube))

print("")
perm = 1
for x in range(9):
    perm *= len(poss_squares[x])
    print(str(len(poss_squares[x])) + " solutions for square " + str(x + 1))
print(str(perm) + " total permutations\n")


def check_cols(cube1, cube2):
    if (cube1[0] + cube1[3] + cube1[6]) & (cube2[0] + cube2[3] + cube2[6]) > 0:
        return 1
    if (cube1[1] + cube1[4] + cube1[7]) & (cube2[1] + cube2[4] + cube2[7]) > 0:
        return 2
    if (cube1[2] + cube1[5] + cube1[8]) & (cube2[2] + cube2[5] + cube2[8]) > 0:
        return 3
    return 0


def check_rows(cube1, cube2):
    if (cube1[0] + cube1[1] + cube1[2]) & (cube2[0] + cube2[1] + cube2[2]) > 0:
        return 1
    if (cube1[3] + cube1[4] + cube1[5]) & (cube2[3] + cube2[4] + cube2[5]) > 0:
        return 2
    if (cube1[6] + cube1[7] + cube1[8]) & (cube2[6] + cube2[7] + cube2[8]) > 0:
        return 3
    return 0


print("trying permutations until I reach the solution...")
for s0 in range(0, len(poss_squares[0])):
    percent_done = round(100.0 * s0 / (len(poss_squares[0]) - 1), 1)
    print(str(percent_done) + "% through the permutations")

    for s1 in range(0, len(poss_squares[1])):
        if check_rows(poss_squares[0][s0], poss_squares[1][s1]) > 0:
            continue

        for s2 in range(0, len(poss_squares[2])):
            if check_rows(poss_squares[2][s2], poss_squares[1][s1]) > 0:
                continue
            if check_rows(poss_squares[2][s2], poss_squares[0][s0]) > 0:
                continue

            for s3 in range(0, len(poss_squares[3])):
                if check_cols(poss_squares[3][s3], poss_squares[0][s0]) > 0:
                    continue

                for s4 in range(0, len(poss_squares[4])):
                    if check_cols(poss_squares[4][s4], poss_squares[1][s1]) > 0:
                        continue
                    if check_rows(poss_squares[4][s4], poss_squares[3][s3]) > 0:
                        continue

                    for s5 in range(0, len(poss_squares[5])):
                        if check_cols(poss_squares[5][s5], poss_squares[2][s2]) > 0:
                            continue
                        if check_rows(poss_squares[5][s5], poss_squares[4][s4]) > 0:
                            continue
                        if check_rows(poss_squares[5][s5], poss_squares[3][s3]) > 0:
                            continue

                        for s6 in range(0, len(poss_squares[6])):
                            if check_cols(poss_squares[6][s6], poss_squares[3][s3]) > 0:
                                continue
                            if check_cols(poss_squares[6][s6], poss_squares[0][s0]) > 0:
                                continue

                            for s7 in range(0, len(poss_squares[7])):
                                if check_cols(poss_squares[7][s7], poss_squares[4][s4]) > 0:
                                    continue
                                if check_cols(poss_squares[7][s7], poss_squares[1][s1]) > 0:
                                    continue
                                if check_rows(poss_squares[7][s7], poss_squares[6][s6]) > 0:
                                    continue

                                for s8 in range(0, len(poss_squares[8])):
                                    if check_cols(poss_squares[8][s8], poss_squares[5][s5]) > 0:
                                        continue
                                    if check_cols(poss_squares[8][s8], poss_squares[2][s2]) > 0:
                                        continue
                                    if check_rows(poss_squares[8][s8], poss_squares[7][s7]) > 0:
                                        continue
                                    if check_rows(poss_squares[8][s8], poss_squares[6][s6]) > 0:
                                        continue

                                    game_solution = []
                                    game_solution.append(parse_bits(poss_squares[0][s0]))
                                    game_solution.append(parse_bits(poss_squares[1][s1]))
                                    game_solution.append(parse_bits(poss_squares[2][s2]))
                                    game_solution.append(parse_bits(poss_squares[3][s3]))
                                    game_solution.append(parse_bits(poss_squares[4][s4]))
                                    game_solution.append(parse_bits(poss_squares[5][s5]))
                                    game_solution.append(parse_bits(poss_squares[6][s6]))
                                    game_solution.append(parse_bits(poss_squares[7][s7]))
                                    game_solution.append(parse_bits(poss_squares[8][s8]))

                                    print("bam! found it!\nsolution is...")
                                    print_solution(game_solution)
                                    exit()