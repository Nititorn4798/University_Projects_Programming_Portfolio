"""
    Discrete Math Project Dijkstra
        By CS 019 013 7012
"""
import os # pylint: disable=import-error
import heapq # pylint: disable=no-name-in-module
import time
import matplotlib.pyplot as plt
import networkx as nx
import numpy as np
import pandas

import sys
from PyQt6.QtWidgets import QApplication, QWidget, QVBoxLayout, QComboBox, QPushButton, QLabel, QLineEdit, QMessageBox, QGridLayout, QGroupBox, QFormLayout, QRadioButton, QFileDialog
from matplotlib.backends.backend_qtagg import FigureCanvasQTAgg
from matplotlib.figure import Figure
from matplotlib.backends.backend_qtagg import NavigationToolbar2QT as NavigationToolbar
from functools import partial
from PyQt6.QtGui import QFontDatabase, QFont, QIcon
import matplotlib.font_manager
from os import path

if 'Sarabun' not in [x.name for x in matplotlib.font_manager.fontManager.ttflist]:
    matplotlib.font_manager.fontManager.addfont('Sarabun-Regular.ttf')
matplotlib.rc('font', family='Sarabun')

current_version = '3.2.1rc2'

def version():
    """แสดงเวอร์ชัน"""
    print('\nVersion History:')
    print('\n\tVersion 1.0b2.dev\n\t28-2-2567 (CLI) \n\tBy CS65 013 019 65003287012\n')
    print('\n\tVersion 1.0b3.dev\n\t21-3-2567 (GUI) \n\tBy CS65 013 019 65003287012\n')
    print('\n\tVersion 2.2.0rc1\n\t22-3-2567 (GUI) \n\tBy CS65 013 019 65003287012\n')
    print('\n\tVersion 3.2.1rc2\n\t22-3-2567 (GUI) \n\tBy CS65 013 019 65003287012\n')

def generate_dictionary(filename:str='coolguy.csv') -> dict:
    """สร้าง dictionary จากไฟล์ csv เป็น dictionary ที่เก็บจุดยอดและจุดประชิดพร้อมน้ำหนัก"""
    if filename in ['coolguy.csv']:
        try:
            df = pandas.read_csv(f'{os.path.dirname(os.path.abspath(__file__))}/{filename}', header=[0], index_col=[0])
        except FileNotFoundError:
            print('coolguy.csv not found.')
            return {}
    else:
        try:
            df = pandas.read_csv(filename, header=[0], index_col=[0])
        except:
            return {'err':'err'}
    adjacency_dictlist = {}
    for i in range(len(df)):
        adjacency_dictlist[df.columns[i].upper()] = {}
        for j in range(len(df)):
            if df.iloc[i, j] not in [np.inf,0]:
                adjacency_dictlist[df.columns[i].upper()].update({df.columns[j].upper():df.iloc[i, j]})
    return adjacency_dictlist

def dijkstra(graph:dict, source:str, destination:str, canvas=None ,seed:int=0):
    """
    ขั้นตอนวิธีของไดก์สตรา (อังกฤษ: Dijkstra's algorithm)
    ถูกคิดค้นขึ้นโดยนักวิทยาการคอมพิวเตอร์ชาวดัตช์นามว่า แอ็ดส์เคอร์ ไดก์สตรา (Edsger Dijkstra) ในปี 1959
    เพื่อแก้ไขปัญหาวิถีสั้นสุดจากจุดหนึ่งใด ๆ สำหรับกราฟที่มีความยาวของเส้นเชื่อมไม่เป็นลบ
    สำหรับขั้นตอนวิธีนี้จะหาระยะทางสั้นที่สุดจากจุดหนึ่งไปยังจุดใด ๆ ในกราฟโดยจะหาเส้นทางที่สั้นที่สุดไปทีละจุดยอดเรื่อย ๆ จนครบตามที่ต้องการ

    Parameters:
    graph (dict): คือ dictionary ที่เก็บกราฟที่มีน้ำหนัก. คีย์จะเป็นโหนด, และค่า value จะเก็บ dictionary อีกชั้นที่เก็บค่า โหนดประชิดและน้ำหนัก
    source (str): คือ โหนดเริ่มต้น
    destination (str): คือ โหนดเป้าหมาย

    Returns:
    list: ค่าเส้นทางที่สั้นที่สุดจาก โหนดเริ่มต้น ไปยัง โหนดเป้าหมาย
    """
    priority_queue = [] #! ระยะทางปัจจุบัน , โหนดปัจจุบัน
    distances = {node: float("inf") for node in graph} #?ทำให้ทุกๆโหนดในกราฟมีค่าเป็น Inf
    distances[source] = 0 #?ตั้งระยะทางของโหนดเริ่มต้น (source) ให้เป็น 0
    previous = {node: None for node in graph} #?ทุกให้ค่าโหนดก่อนหน้าของทุกโหนด มีค่าเป็น None
    heapq.heappush(priority_queue, (0, source)) #! โหนดเริ่มต้นมีค่าเป็น 0
    while priority_queue:
        current_distance, current_node = heapq.heappop(priority_queue) #!ลบตัวที่น้อยที่สุดให้คิวและนำมาใช้คิด
        if current_node == destination: #!ถ้าโหนดปัจจุบันเป็นโหนดเป้าหมาย
            break
        for neighbor, weight in graph[current_node].items(): #!ดึงค่าด้านประชิดและน้ำหนักจากโหนดปัจจุบัน
            distance = current_distance + weight #?คิดระยะทางที่จะใส่ จาก ระยะทางปัจจุบัน + น้ำหนักเส้น
            if distance < distances[neighbor]: #!ถ้า ระยะทางที่จะใส่ น้อยกว่า ระยะทางเดิม
                distances[neighbor] = distance #!ตั้งให้ ระยะทางของด้านประชิด = ระยะทางที่จะใส่
                previous[neighbor] = current_node #!ตั้งให้ตัวก่อนหน้าของโหนดที่ใส่ เป็นค่าของโหนดที่ ทำการใส่
                heapq.heappush(priority_queue, (distance, neighbor)) #!เก็บค่า ระยะทาง และ ชื่อโหนดใส่คิวไว้ คิดในรอบถัดไป

    path = [] #? list ว่างไว้เก็บเส้นทาง
    current_node = destination #!ตั้งตัวแปรโหนดปัจจุบันให้เป็น โหนดเป้าหมาย(จบ)
    while current_node is not None: #!ถ้าโหนดไม่เป็นค่า None
        path.append(current_node) #!?เก็บค่าโหนดไว้ใน Path
        current_node = previous[current_node] #?แล้วทำการตั้งตัวแปรโหนดปัจจุบันให้เป็นโหนดก่อนหน้า โดยเรียกผ่านตัวแปร previous
    path.reverse() #!แล้วทำการสลับลำดับข้อมูลในลิสต์แบบกลับด้าน เช่น DCBA -> ABCD

    if distances[destination] == float("inf"):
        return 'not found'

    if canvas:
        canvas.figure.clear()
        ax = canvas.figure.add_subplot(111)
        ax.set_title(f'The Shortest Distance from "{source}" to "{destination}" is {distances[destination]} km.')
        G = nx.Graph() #?สร้างกราฟว่าง โดยใช้ library networkx
        for vertex, neighbors in graph.items(): #!ทำการดึง items (key = โหนด,value = โหนดประชิดทั้งหมด) จาก dict graph
            for neighbor, weight in neighbors.items(): #!ทำการดึง items (key = โหนดประชิด,value = น้ำหนัก) จาก dict โหนดประชิดทั้งหมด
                G.add_edge(vertex, neighbor, weight=weight) #?ใช้ ฟังก์ชันเพิ่มด้านระหว่างโหนดจาก library networkx พร้อมกำหนดน้ำหนักเส้น
        if seed != 0:
            pos = nx.spring_layout(G, seed=seed) #? คำนวณตำแหน่งพิกัดในการวาง โหนดต่างๆโดยใช้ Algorithm spring layout , planar_layout , สามารถกำหนด seed ได้ nx.spring_layout(G)
        else:
            pos = nx.spring_layout(G)
        nx.draw(G, pos, ax=ax) #!วาดกราฟโดยใช้ตำแหน่งที่คำนวณมา
        nx.draw_networkx_nodes(G, pos, nodelist=graph.keys(), node_color='#FF777F' ,node_shape='o', node_size=900, ax=ax)
        nx.draw_networkx_nodes(G, pos, nodelist=graph.keys(), node_color='#FD7766' ,node_shape='o', node_size=750, ax=ax)
        nx.draw_networkx_labels(G, pos, ax=ax, font_family='Sarabun') #!เพิ่มป้ายลงไปในกราฟที่วาด โดยใช้ตำแหน่งจาก pos ที่คำนวณไว้
        weight_labels = nx.get_edge_attributes(G, 'weight') #!รับค่าน้ำหนักเส้นจากกราฟ
        nx.draw_networkx_edges(G, pos, edgelist=list(zip(path, path[1:])), width=5, edge_color='#F44576', alpha=0.7, ax=ax) #!วาดเส้นทางที่สั้นที่สุดจากตัวแปร path ที่เก็บไว้ เช่น จาก เส้นทาง ['A', 'B', 'C', 'D'] --เปลี่ยนเป็นคู่อันดับ tuple>> [('A', 'B'), ('B', 'C'), ('C', 'D')]
        nx.draw_networkx_nodes(G, pos, nodelist=path, node_color='#F5F000', node_size=1150, ax=ax)
        nx.draw_networkx_nodes(G, pos, nodelist=path, node_color='#F5F252', node_size=1000, ax=ax)
        nx.draw_networkx_nodes(G, pos, nodelist=[source, destination], node_color='#0FF001', node_size=1650, ax=ax)
        nx.draw_networkx_nodes(G, pos, nodelist=[source, destination], node_color='#75F551', node_size=1500, ax=ax)
        nx.draw_networkx_edge_labels(G, pos, edge_labels=weight_labels, ax=ax, label_pos=0.5, font_family='Sarabun') #!เพิ่มป้ายน้ำหนักลงไปในกราฟ จากน้ำหนักที่รับมา โดยวางในตำแหน่งที่รับมาจากตัวแปร pos
        canvas.draw() #!วาดกราฟที่ทำการประมวลผลไว้แล้วลงใน canvas
    return path #!ส่งค่าเส้นทางที่สั้นที่สุดกลับไปยัง 'Instance' ที่เรียกใช้ฟังก์ชัน dijkstra มา

class PlotWidget(QWidget):
    def __init__(self, parent=None):
        super().__init__(parent)
        self.figure = plt.figure()
        self.canvas = FigureCanvasQTAgg(self.figure)
        self.toolbar = NavigationToolbar(self.canvas, self)
        layout = QGridLayout(self)
        layout.addWidget(self.canvas)
        layout.addWidget(self.toolbar)

class DijkstraUI(QWidget):
    def __init__(self, adjacency_dict):
        super().__init__()
        self.adjacency_dict = adjacency_dict
        self.setup_ui()

    def setup_ui(self):
        layout = QGridLayout()

        self.source_combo = QComboBox()
        self.destination_combo = QComboBox()
        self.new_combo = QComboBox()

        airports_dict = sorted(self.adjacency_dict.keys())
        self.source_combo.addItems(airports_dict)
        self.source_combo.setPlaceholderText("--Add Some Nodes--")
        self.source_combo.setCurrentIndex(0)
        self.destination_combo.addItems(airports_dict)
        self.destination_combo.setPlaceholderText("--Add Some Nodes--")
        self.destination_combo.setCurrentIndex(1)
        self.new_combo.addItems(airports_dict)

        self.neighbor_text = QLineEdit()
        self.neighbor_text2 = QLineEdit()
        self.weight_text = QLineEdit()

        self.add_button = QPushButton("Add")
        self.add_button.clicked.connect(self.add_airport_and_weight)

        self.calculate_button = QPushButton("Calculate Shortest Path")
        self.calculate_button.clicked.connect(self.calculate_shortest_path)

        self.save_button = QPushButton("Save File")
        self.save_button.clicked.connect(self.generate_csv)
        self.openfile_button = QPushButton("Open CSV File")
        self.openfile_button.clicked.connect(self.getFileName)

        self.about_button = QPushButton("About")
        self.about_button.clicked.connect(self.about_info)
        self.version_button = QPushButton("Version History")
        self.version_button.clicked.connect(self.version_info)

        self.reset_button = QPushButton("Reset")
        self.reset_button.clicked.connect(self.reset)

        self.result_label = QLabel()
        self.file_label = QLabel()

        self.plot_widget = PlotWidget()
        self.plot_widget.setMinimumHeight(700)

        self.setLayout(layout)
        self.title_cs65 = f"Dijkstra Shortest Path Finder Version {current_version} By CS65 019 013 7012"
        self.setWindowTitle(self.title_cs65)
        self.setWindowIcon(QIcon('ico.ico'))

        self.radio_random_seed = QRadioButton("Random")
        self.radio_with_seed = QRadioButton("Use Seed")

        self.radio_random_seed.setChecked(True)

        self.seed_label = QLabel("Seed:")
        self.seed_input = QLineEdit()
        self.seed_input.setDisabled(True)

        self.radio_random_seed.toggled.connect(self.disable_seed_input)
        self.radio_with_seed.toggled.connect(self.enable_seed_input)

        self.setLayout(layout)

        groupbox = QGroupBox('Shortest Path')
        form_layout = QFormLayout()
        groupbox.setLayout(form_layout)
        groupbox.setMaximumWidth(300)
        form_layout.addRow(QLabel("Source:"))
        form_layout.addRow(self.source_combo)
        form_layout.addRow(QLabel("Destination:"))
        form_layout.addRow(self.destination_combo)
        form_layout.addRow(QLabel())
        form_layout.addRow(self.calculate_button)
        form_layout.addRow(self.radio_random_seed,self.radio_with_seed)
        form_layout.addRow(self.seed_label)
        form_layout.addRow(self.seed_input)

        groupbox_node = QGroupBox('Vertices and Weight')
        form_layout = QFormLayout()
        groupbox_node.setLayout(form_layout)
        groupbox_node.setMaximumWidth(300)
        form_layout.addRow(QLabel("Source Node:"))
        form_layout.addRow(self.neighbor_text2)
        form_layout.addRow(QLabel("Destination Node:"))
        form_layout.addRow(self.neighbor_text)
        form_layout.addRow(QLabel("Weight:"))
        form_layout.addRow(self.weight_text)
        form_layout.addRow(QLabel())
        form_layout.addRow(self.add_button)
        form_layout.addRow(QLabel("Reset:"))
        form_layout.addRow(self.reset_button)

        groupbox_plot = QGroupBox('Plot')
        form_layout = QFormLayout()
        groupbox_plot.setLayout(form_layout)
        form_layout.addRow(self.plot_widget)
        form_layout.addRow(QLabel())
        form_layout.addRow(self.result_label)
        form_layout.addRow(self.file_label)

        groupbox_save = QGroupBox('File')
        form_layout = QFormLayout()
        groupbox_save.setLayout(form_layout)
        form_layout.addRow(self.save_button)
        form_layout.addRow(self.openfile_button)
        form_layout.addRow(QLabel())
        form_layout.addRow(QLabel())
        form_layout.addRow(self.about_button,self.version_button)

        layout.addWidget(groupbox,0,0,1,1)
        layout.addWidget(groupbox_node,1,0,1,1)
        layout.addWidget(groupbox_plot,0,1,3,3)
        layout.addWidget(groupbox_save,2,0,1,1)

        self.resize(1300, 700)

    def reset(self):
        self.adjacency_dict = {}
        self.plot_widget.figure.clear()
        self.plot_widget.canvas.draw()
        self.refresh_combo_boxes()
        self.file_label.setText(f"The graph plot was successfully reset.")
        self.result_label.setText(f"")

    def plot_update(self, canvas, graph, seed, source_node="", destination_node="", weight=0, text=""):
        if canvas:
            canvas.figure.clear()
            ax = canvas.figure.add_subplot(111)
            G = nx.Graph() #?สร้างกราฟว่าง โดยใช้ library networkx
            for vertex, neighbors in graph.items(): #!ทำการดึง items (key = โหนด,value = โหนดประชิดทั้งหมด) จาก dict graph
                for neighbor, weight in neighbors.items(): #!ทำการดึง items (key = โหนดประชิด,value = น้ำหนัก) จาก dict โหนดประชิดทั้งหมด
                    G.add_edge(vertex, neighbor, weight=weight) #?ใช้ ฟังก์ชันเพิ่มด้านระหว่างโหนดจาก library networkx พร้อมกำหนดน้ำหนักเส้น
            if seed != 0:
                pos = nx.spring_layout(G, seed=seed) #? คำนวณตำแหน่งพิกัดในการวาง โหนดต่างๆโดยใช้ Algorithm spring layout , planar_layout , สามารถกำหนด seed ได้ nx.spring_layout(G)
            else:
                pos = nx.spring_layout(G)

            if text != "":
                ax.set_title(f'{text}')
            elif source_node not in [''] and destination_node not in ['']:
                ax.set_title(f'Node "{source_node}" and Node "{destination_node}" were successfully added with a weight of {weight}. ')
                nx.draw_networkx_nodes(G, pos, nodelist=[source_node, destination_node], node_color='#0FF001', node_size=1100, ax=ax)
            nx.draw(G, pos, ax=ax) #!วาดกราฟโดยใช้ตำแหน่งที่คำนวณมา
            nx.draw_networkx_nodes(G, pos, nodelist=graph.keys(), node_color='#FF777F' ,node_shape='o', node_size=900, ax=ax)
            nx.draw_networkx_nodes(G, pos, nodelist=graph.keys(), node_color='#FD7766' ,node_shape='o', node_size=750, ax=ax)

            nx.draw_networkx_labels(G, pos, ax=ax, font_family='Sarabun') #!เพิ่มป้ายลงไปในกราฟที่วาด โดยใช้ตำแหน่งจาก pos ที่คำนวณไว้
            weight_labels = nx.get_edge_attributes(G, 'weight') #!รับค่าน้ำหนักเส้นจากกราฟ
            nx.draw_networkx_edge_labels(G, pos, edge_labels=weight_labels, ax=ax, label_pos=0.5, font_family='Sarabun') #!เพิ่มป้ายน้ำหนักลงไปในกราฟ จากน้ำหนักที่รับมา โดยวางในตำแหน่งที่รับมาจากตัวแปร pos
            canvas.draw() #!วาดกราฟที่ทำการประมวลผลไว้แล้วลงใน canvas
        else:
            print("error")

    def about_info(self):
        dlg = QMessageBox(self)
        dlg.setWindowTitle("About")
        dlg.setText("Heart-made By CS65\n\n65003263019 \n65003263013 \n65003287012\n\n\nClean code always looks like it was written by someone who cares.\n\nThe strong one doesn't win. The one that wins is strong.                                  ")
        button = dlg.exec()

    def version_info(self):
        dlg = QMessageBox(self)
        dlg.setWindowTitle("Version History")
        dlg.setText("\nVersion 1.0b2.dev\n28-2-2567 (CLI) \n\nVersion 1.0b3.dev\n21-3-2567 (GUI) \n\nVersion 2.2.0rc1 \n22-3-2567 (GUI) \n\nVersion 3.2.1rc2 (Current Version)\n\n\nBy RRU CS65 013 019 65003287012\n                                                                   ")
        button = dlg.exec()

    def add_airport_and_weight(self):
        new_source = self.neighbor_text2.text().upper()
        new_neighbor = self.neighbor_text.text().upper()
        try:
            new_weight = float(self.weight_text.text())
        except ValueError:
            QMessageBox.warning(self, "Warning", "Graph weights must be numbers only.")
            return

        if new_source in [''] or new_neighbor in ['']:
            QMessageBox.warning(self, "Warning", "Node names must be at least 1 character long.")
            return

        if new_weight < 0:
            QMessageBox.warning(self, "Warning", "Graph weights must not be negative.")
            return

        if new_source == new_neighbor:
            QMessageBox.warning(self, "Warning", "Source and destination must be different.")
            return

        if new_source not in self.adjacency_dict.keys():
            self.adjacency_dict[new_source] = {}
        self.adjacency_dict[new_source][new_neighbor] = new_weight
        self.adjacency_dict.update({f'{new_neighbor}':{new_source:new_weight}})
        self.plot_widget.figure.clear()
        self.plot_update(self.plot_widget.canvas ,self.adjacency_dict ,self.get_seed() ,source_node=new_source ,destination_node=new_neighbor)
        self.refresh_combo_boxes()
        self.plot_widget.canvas.draw()

    def refresh_combo_boxes(self):
        self.source_combo.clear()
        self.new_combo.clear()
        self.destination_combo.clear()
        airports = self.adjacency_dict.keys()
        self.source_combo.addItems(airports)
        self.new_combo.addItems(airports)
        self.destination_combo.addItems(airports)
        self.source_combo.setCurrentIndex(0)
        self.destination_combo.setCurrentIndex(1)
        self.new_combo.setCurrentIndex(len(airports)-1)

    def disable_seed_input(self):
        self.seed_input.setDisabled(True)

    def enable_seed_input(self):
        self.seed_input.setDisabled(False)

    def get_seed(self)->int:
        if self.radio_with_seed.isChecked():
            try:
                seed = int(self.seed_input.text())
                if 0 <= seed <= 4294967295:
                    return seed
                else:
                    QMessageBox.warning(self, "Warning", "Seed must be between 0 and 4294967295 (2**32 - 1).")
                    self.radio_random_seed.setChecked(True)
                    self.seed_input.setText('4294967295')
                    return 0
            except ValueError:
                seed = 0
        else:
            return 0

    def generate_csv(self):
        save_path = self.getSaveFileName()
        if save_path not in ['']:
            df = pandas.DataFrame(index=self.adjacency_dict.keys(), columns=self.adjacency_dict.keys())

            for source, destination in self.adjacency_dict.items():
                for destination, distance in destination.items():
                    df.at[source, destination] = distance
            for airport in df.index:
                if df.at[airport, airport]:
                    df.at[airport, airport] = 0
            df = df.fillna('inf')
            df.to_csv(f'{save_path}', index=True)
            QMessageBox.information(self, "Save", "Save successful.")
            return
        else:
            QMessageBox.warning(self, "Save", "Save operation canceled. Please select a location to save the file and try again.")
            return

    def getFileName(self):
        file_filter = 'Data File ( *.csv )'
        response = QFileDialog.getOpenFileName(
            parent=self,
            caption='Select A CSV File',
            directory=os.getcwd(),
            filter=file_filter,
            initialFilter='Data File ( *.csv )'
        )
        try:
            temp_dict = {}
            temp_dict.update(self.adjacency_dict)
            self.adjacency_dict = generate_dictionary(response[0])
            if self.adjacency_dict == {'err':'err'}:
                self.adjacency_dict.clear()
                self.adjacency_dict.update(temp_dict)
                self.plot_update(self.plot_widget.canvas ,self.adjacency_dict ,self.get_seed())
                QMessageBox.warning(self, "Open", "Open File Failed.")
            else:
                self.plot_update(self.plot_widget.canvas ,self.adjacency_dict , self.get_seed(),text=f"Graph data loaded successfully with {len(self.adjacency_dict.keys())} node(s).")
                self.file_label.setText(f"Working on the file: {response[0]}")
                self.refresh_combo_boxes()
                return self.adjacency_dict
            self.refresh_combo_boxes()
            self.plot_update(self.plot_widget.canvas ,self.adjacency_dict , self.get_seed())
            return self.adjacency_dict
        except:
            self.adjacency_dict.clear()
            self.adjacency_dict.update(temp_dict)
            QMessageBox.warning(self, "Open", "Open File Failed.")
            self.refresh_combo_boxes()
            return

    def getSaveFileName(self):
        file_filter = 'Data File ( *.csv )'
        response = QFileDialog.getSaveFileName(
            parent=self,
            caption='Save File',
            directory= 'coolkid.csv',
            filter=file_filter,
            initialFilter='Data File ( *.csv )'
        )
        return response[0]

    def calculate_shortest_path(self):
        source = self.source_combo.currentText()
        destination = self.destination_combo.currentText()

        if source == destination:
            QMessageBox.warning(self, "Warning", "The Source and destination must be different.")
            return

        if source in [''] or destination in ['']:
            QMessageBox.warning(self, "Warning", "You must enter the source and destination.")
            return

        self.plot_widget.figure.clear()

        path_result = dijkstra(self.adjacency_dict, source, destination, self.plot_widget.canvas, self.get_seed())
        if path_result == 'not found':
            QMessageBox.warning(self, "Warning", "No connection between airports found.")
            return
        path_string = path_result[0]
        for i, j in enumerate(path_result):
            if i > 0:
                path_string += f' → {j}'

        self.result_label.setText(f"Shortest Path: {path_string}")

        self.plot_widget.canvas.draw()

if __name__ == "__main__":
    try:
        version()
        adjacency_dict = generate_dictionary()
        app = QApplication(sys.argv)
        app.setStyle('Fusion')
        dijkstra_app = DijkstraUI(adjacency_dict)
        dijkstra_app.show()
        sys.exit(app.exec())
    except:
        raise
