public class CPU_running{
	public ReadyQueue queue; // ����ť
	public int cburst[]; // cpu burst
	public int carray[]; // ���μ����� cpu �迭
	public int num; //���μ��� ����
	public int allcputime[]; //���μ����� �� cpu �ð� 
	public IO io;
	public int i;

	public CPU_running(int num, int cburst[], int allcputime[], ReadyQueue q, IO io){
		this.num = num;
		this.cburst = cburst;
		this.carray = new int[num];
		this.allcputime = allcputime;
		this.queue = q;
		this.io = io;
	}

	public void cpuing(int a){
		i = a;
		if(allcputime[i] >= cburst[i]){
			cburst[i] -= 1;
			allcputime[i] -= 1;
			carray[i] += 1;
		}
		else if(allcputime[i] < cburst[i]){
			allcputime[i] = 0;
			cburst[i] += 0;
			carray[i] += 0;
		}
		if(cburst[i] == 0){
			queue.remove();
			io.IOinsert(i);
			queue.counterrq();
			i++;
			if(i == num)
				i = 0;
		}
	}
}