#include <bits/stdc++.h>

using namespace std;

long long findMinWay(long long** vertices, long long count, long long s, long long f)
{
    vector<long long> dist(count, long LONG_LONG_MAX);
    bool* isUsed = new bool[count];
    for (long long i = 0; i < count; i++)
        isUsed[i] = false;
    dist[s] = 0;
    long long index, minDistance;
    for (long long i = 0; i < count; i++)
    {
        minDistance = long LONG_LONG_MAX;
        index = -1;
        for (long long j = 0; j < count; j++)
        {
            if (dist[j] < minDistance && !isUsed[j])
            {
                minDistance = dist[j];
                index = j;
            }
        }
        if (index == -1)
            break;
        isUsed[index] = true;
        for (long long j = 0; j < count; j++)
        {
            if (vertices[index][j] == -1 && j != index)
                continue;
            dist[j] = min(dist[j], dist[index] + vertices[index][j]);
        }

    }
    return dist[f];
}
long long main()
{
   
    long long n, s, f;
    cin >> n >> s >> f;
    long long** vertices = new long long* [n];
    for (long long i = 0; i < n; i++)
    {
        vertices[i] = new long long[n];
        for (long long j = 0; j < n; j++)
            cin >> vertices[i][j];
    }
    long long var = findMinWay(vertices, n, s - 1, f - 1);
    if (var == long LONG_LONG_MAX)
        cout << -1;
    else
        cout << var;
    return 0;
}

