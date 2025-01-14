graph = {
    'A': ['B', 'C'],
    'B': ['D', 'E'],
    'C': ['F'],
    'D': [],
    'E': ['F'],
    'F': []
}

graph_v4 = {
    'A': ['B', 'D', 'E'],
    'B': ['A', 'C'],
    'C': ['B'],
    'D': ['A'],
    'E': ['A', 'F'],
    'F': ['E', 'G', 'H'],
    'G': ['F'],
    'H': ['F']
}

visited = []  # List to keep track of visited nodes.
queue = []  #Initialize a queue


def bfs(visited, graph, node):
    visited.append(node)
    queue.append(node)

    while queue:
        s = queue.pop(0)
        print(s, end=" ")

        for neighbour in graph[s]:
            if neighbour not in visited:
                visited.append(neighbour)
                queue.append(neighbour)


# Driver Code
bfs(visited, graph, 'A')
print("\n")

visited = []  # List to keep track of visited nodes.
queue = []  #Initialize a queue

bfs(visited, graph_v4, 'A')

