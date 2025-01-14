# Using a Python dictionary to act as an adjacency list
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

visited = set()  # Set to keep track of visited nodes.


def dfs(visited, graph, node):
    if node not in visited:
        print(node, end=" ")
        visited.add(node)
        for neighbour in graph[node]:
            dfs(visited, graph, neighbour)


# Driver Code
dfs(visited, graph_v4, 'A')
